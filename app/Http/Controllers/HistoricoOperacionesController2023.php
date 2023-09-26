<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->addColumn('time_open', 'historicoOperaciones.fecha')
        ->addColumn('profit', 'historicoOperaciones.profit')
        ->rawColumns(['profit', 'time_open'])
        ->toJson();

    }

    public function getHistoricosFiltro2023(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;

        $historico = DB::table('historico_operaciones')->select()->whereBetween('time_open', [$fechaInicio, $fechaFin])->orderBy('id', 'DESC')->get();

        return datatables()->of($historico)->toJson();
    }
}
