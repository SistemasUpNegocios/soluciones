<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\OperacionHija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesbalanceoController extends Controller
{
    public function index()
    {
        return view('desbalanceo.show');        
    }

    public function getOperaciones()
    {
        $operacionesMadre = DB::table('operacion')
        ->join('traders', 'traders.id', '=', 'operacion.trader_id')
        ->select(DB::raw("traders.id AS traderIDMadre, traders.nombre AS nombreTraderMadre, operacion.no_operacion AS no_operacionMadre"))
        ->orderBy('traders.id', 'ASC')
        ->get();

        $data = array();

        foreach($operacionesMadre->unique('nombreTraderMadre') as $operacionMadre){
            array_push($data, $operacionMadre);
        }

        return datatables()->of($data)
            ->addColumn('operaciones_mam', 'desbalanceo.operaciones_mam')
            ->addColumn('operaciones_pool', 'desbalanceo.operaciones_pool')
            ->addColumn('operaciones_trader', 'desbalanceo.operaciones_trader')
            ->rawColumns(['operaciones_mam', 'operaciones_pool', 'operaciones_trader'])->toJson();
    }

    public function getOperacionesFix()
    {

        $operaciones = DB::table('operacion_hija')
        ->select(DB::raw("id AS operacionFixId, no_operacion AS no_operacionFix"))
        ->where('status', 'abierta')
        ->where('operacion_id', 0)
        ->get();

        return datatables()->of($operaciones)
            ->addColumn('operaciones_mam_fix', 'desbalanceo.operaciones_mam_fix')
            ->addColumn('operaciones_pool_fix', 'desbalanceo.operaciones_pool_fix')
            ->addColumn('operacion_madre', 'desbalanceo.operacion_madre')
            ->rawColumns(['operaciones_mam_fix', 'operaciones_pool_fix', 'operacion_madre'])->toJson();
    }

    public function addNoOperacion(Request $request)
    {
        $operacion_hija = OperacionHija::find($request->id);

        $operacion_hija->operacion_id = $request->operacion_id;
        $operacion_hija->update();

        return response($operacion_hija);
    }
}