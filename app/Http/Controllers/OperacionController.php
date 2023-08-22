<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OperacionController extends Controller
{
    public function index()
    {
    
        return view('operacion.show');
    }

    public function getOperacion()
    {
        $operacion = DB::table('operacion')
            ->join('traders', 'traders.id', '=', 'operacion.trader_id')
            ->select(DB::raw("operacion.id, operacion.no_operacion, operacion.status, operacion.fecha, traders.id, traders.nombre as nombreTrader"))
            ->get();

        return datatables()->of($operacion)->addColumn('fecha', 'operacion.fecha')->rawColumns(['fecha'])->toJson();
    }

    public function getOperacionHija()
    {
        $operacionHija = DB::table('operacion_hija')
            ->join('traders', 'traders.id', '=', 'operacion_hija.trader_id')
            ->select(DB::raw("operacion_hija.id, operacion_hija.no_operacion, operacion_hija.status, operacion_hija.fecha, operacion_hija.operacion_id, traders.id AS trader_id, traders.nombre AS nombreTrader"))
            ->get();

        return datatables()->of($operacionHija)->addColumn('fecha', 'operacion.fecha')->addColumn('operacionMadre', 'operacion.operacionmadre')->rawColumns(['fecha', 'operacionMadre'])->toJson();
    }

    public function getOperacionesHuerfanas()
    {

        $operaciones_hijas = DB::table("operacion_hija")->get();
        $operaciones_huerfanas = array();

        foreach ($operaciones_hijas as $operacion_hija) {
            $fechaOperacion = \Carbon\Carbon::createFromDate($operacion_hija->fecha);
            $hora = $fechaOperacion->format('H');

            if ($hora < 12 || $operacion_hija->status == "conflicto"){
                return response("Existen operaciones en conflicto.");            
            }else{
        
                $operacionMadre = DB::table("operacion")
                ->where("no_operacion", "=", $operacion_hija->operacion_id)
                ->get();
    
                if ($operacionMadre->isEmpty()){
                    return response("Existen operaciones huerfanas.");
                }
            }
        }
        
    }

    public function reportHuerfanas()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        $operacionHija = DB::table('operacion_hija')
            ->join('traders', 'traders.id', '=', 'operacion_hija.trader_id')
            ->select(DB::raw("operacion_hija.id, operacion_hija.no_operacion, operacion_hija.status, operacion_hija.fecha, operacion_hija.operacion_id, traders.id, traders.nombre AS nombreTrader"))
            ->get();

        $huerfanasVacias = array();
        $huerfanas = array();
        foreach ($operacionHija as $hija) {            
            $operacionMadre = DB::table("operacion")
            ->select()
            ->where("no_operacion", "=", $hija->operacion_id)
            ->first();

            $operacionHijaMadre = DB::table('operacion_hija')
            ->join('operacion', 'operacion.no_operacion', '=', 'operacion_hija.operacion_id')
            ->join('traders', 'traders.id', '=', 'operacion_hija.trader_id')        
            ->select(DB::raw("operacion_hija.id, operacion.status AS statusMadre, operacion_hija.fecha, operacion_hija.no_operacion, operacion_hija.status, operacion_hija.operacion_id, traders.nombre AS nombreTrader, operacion.trader_id AS nombreTraderMadre"))
            ->where("operacion.no_operacion", "=", $hija->operacion_id)
            ->first();

            $fechaOperacion = \Carbon\Carbon::createFromDate($hija->fecha);
            $fecha_limite = strtotime("2022-08-15 11:58:38");
            $fecha_operacion = strtotime($fechaOperacion);

            if (empty($operacionMadre)){
                if( $fecha_operacion > $fecha_limite && $hija->operacion_id > 0 && $hija->status == "abierta"){
                        $huerfanasVacias[] = $hija;
                }
            }else{
                if ($hija->operacion_id > 0 && $operacionHijaMadre->status == "abierta" && $operacionHijaMadre->statusMadre == "cerrada") {
                            $huerfanas[] = $operacionHijaMadre;
                }
            }
        }
       
        $pdf = PDF::loadView('operacion.pdf', ["huerfanasVacias" => $huerfanasVacias, "huerfanas" => $huerfanas]);
        $nombreDescarga = date("d-m-Y_H-i", strtotime("now"));
        return $pdf->stream("reporte_operaciones_huerfanas_$nombreDescarga"."hrs.pdf");

    }

    public function cierreHuerfana(Request $request)
    {
        $solicitud = new Solicitud;
        $solicitud->clave = "cierre";
        $solicitud->status = "pendiente";
        $solicitud->trader_id = $request->trader_id;
        $solicitud->comentario = $request->no_operacion;

        $solicitud->save();

        return response($solicitud);
    }

}