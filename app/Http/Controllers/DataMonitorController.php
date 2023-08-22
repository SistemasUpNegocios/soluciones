<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataMonitorController extends Controller
{
    public function index()
    {
        
        return view('datamonitor.show');
        
    }

    public function getMonitor()
    {

        $valores_moneda = DB::table('valores_moneda')->select()->orderBy('id', 'DESC')->get();

        $data = array();

        foreach($valores_moneda->unique('moneda') as $valor_moneda){
            array_push($data, $valor_moneda);
        }

        return datatables()->of($data)->addColumn('ratio', 'monitor.ratio')->addColumn('hora', 'monitor.fecha')->rawColumns(['ratio', 'hora'])->toJson();

        // return datatables()->of($data)->addColumn('ratio', 'monitor.ratio')->addColumn('color', 'monitor.color')->addColumn('hora', 'monitor.fecha')->rawColumns(['ratio', 'color', 'hora'])->toJson();

    }

    // public function editarColor(Request $request)
    // {
    //     $valores_moneda = ValoresMoneda::find($request->id);
    //     $valores_moneda->color = $request->color;

    //     $valores_moneda->update();
    // }

    public function solicitarApertura(Request $request)
    {
        $solicitud = new Solicitud;
        $solicitud->clave = "apertura";
        $solicitud->status = "pendiente";
        $solicitud->trader_id = 100000;
        $solicitud->comentario = "$request->moneda, $request->type, $request->valor, $request->sl, $request->tp, $request->profit, $request->risk";

        $solicitud->save();

        return response($solicitud);
    }

}
