<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    public function index()
    {
        return view('logs.show');
    }

    public function getLogs()
    {
        $logs = DB::table('logs')->select()->orderBy('fecha', 'DESC')->get();

        return datatables()->of($logs)->addColumn('fecha', 'logs.fecha')->rawColumns(['hora'])->toJson();
    }

    public function getLogsFiltro(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;

        $logs = DB::table('logs')->select()->whereBetween('fecha', [$fechaInicio, $fechaFin])->orderBy('fecha', 'DESC')->get();

        return datatables()->of($logs)->addColumn('fecha', 'logs.fecha')->rawColumns(['hora'])->toJson();
    }

}