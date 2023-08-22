<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

class TradersDataAperturaController extends Controller
{

    public function index()
    {
        return view('tradersdataapertura.show');
    }

    public function getInfo(Request $request)
    {
        $tradersNombre = DB::table('traders_data')->select('id','Signal','Balance')->where('id', $request->id)->first();
        $pares = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');

        $data = array(
            "tradersNombre" => $tradersNombre,
            "fecha_inicio" => $fecha_inicio,
            "fecha_fin" => $fecha_fin,
            "monedas" => $pares
        );

        return response()->view('tradersdataapertura.table', $data, 200);
    }


    public function getPDF(Request $request)
    {

        $tradersNombre = DB::table('traders_data')->select('id','Signal','Balance')->where('id', $request->id)->first();
        $pares = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');

        $data = array(
            "tradersNombre" => $tradersNombre,
            "fecha_inicio" => $fecha_inicio,
            "fecha_fin" => $fecha_fin,
            "monedas" => $pares
        );
    
        $pdf = PDF::loadView('tradersdataapertura.imprimir', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('traders-analysis.pdf');
    }
}