<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

use Dompdf\Options;
use \PDF;


class HistoricoOperacionesController2023 extends Controller
{
    public function index()
    {
        return view('historicoOperaciones2023.show');
    }

    public function getHistoricos2023()
    {
        $historico = DB::table('historico_operaciones')->select()->orderBy('id', 'DESC')->get();

        return datatables()->of($historico)
        ->addColumn('time_open', 'historicoOperaciones2023.fecha')
        ->addColumn('time_close', 'historicoOperaciones2023.fechacierre')
        ->addColumn('profit', 'historicoOperaciones2023.profit')
        ->rawColumns(['profit', 'time_open', 'time_close'])
        ->toJson();

    }

    public function getHistoricosFiltro2023(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;

        $historico = DB::table('historico_operaciones')->select()->whereBetween('time_open', [$fechaInicio, $fechaFin])->orderBy('id', 'DESC')->get();

        return datatables()->of($historico)
        ->addColumn('time_open', 'historicoOperaciones2023.fecha')
        ->addColumn('time_close', 'historicoOperaciones2023.fechacierre')
        ->addColumn('profit', 'historicoOperaciones2023.profit')
        ->rawColumns(['profit', 'time_open', 'time_close'])
        ->toJson();
    }

    public function generatePDFHistoricos(Request $request)
    {

        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;

        $historico = DB::table('historico_operaciones')->select()->whereBetween('time_open', [$fechaInicio, $fechaFin])->orderBy('id', 'ASC')->get();

        $data = [
            'historico' => $historico,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin
        ];

      
                ini_set('max_execution_time', 180); //3 minutes

                $pdf = PDF::loadView('historicoOperaciones2023.imprimir', $data)->setPaper('a4', 'landscape');
                return $pdf->stream('historicoOperaciones.pdf');

    
    }
}
