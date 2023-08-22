<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusGraficaController extends Controller
{
    // public function index(Request $request)
    // {
    //     return view('statusgrafica.show');
    // }

    // public function getMonedas()
    // {
    //     $monedas = DB::table('valores_moneda')
    //         ->select(DB::raw('DISTINCT moneda'))
    //         ->get();

    //     return response(['monedas' => $monedas]);
    // }    

    public function indexProfit(Request $request)
    {
        $trader = DB::table('traders')
            ->select('nombre')
            ->where('id', $request->id)
            ->first();

        return view('statusgrafica.showprofit', compact('trader'));
    }

    public function getGraficaProfit(Request $request)
    {

        $par = $request->par;
        $monedas = DB::table('status_profit')
            ->select("$par")
            ->where('trader_id', $request->id)
            ->orderBy('fecha', 'DESC')
            ->first();

        return response($monedas->$par);
    }

    public function indexLote(Request $request)
    {
        $trader = DB::table('traders')
            ->select('nombre')
            ->where('id', $request->id)
            ->first();

        return view('statusgrafica.showlotes', compact('trader'));
    }

    public function getGraficaLote(Request $request)
    {

        $par = $request->par;
        $monedas = DB::table('status_lot')
            ->select("$par")
            ->where('trader_id', $request->id)
            ->orderBy('fecha', 'DESC')
            ->first();

        return response($monedas->$par);
    }

    public function indexSumLote(Request $request)
    {
        return view('statusgrafica.showsumalotes');
    }

    public function indexEquity(Request $request)
    {
        return view('statusgrafica.showequity');
    }

    public function indexVelocimetro(Request $request)
    {
        $par = $request->par;
        $cleo_data = DB::table('cleo_data')
            ->where('pair', $par)
            ->orderBy('cleo_data.id', 'DESC')
            ->first();

        $market = $cleo_data->market;
        $direction = $cleo_data->direction;
        $shot = $cleo_data->shot;
        $fecha = $cleo_data->fecha;
            
        return view('statusgrafica.showvelocimetro', compact('par', 'market', 'direction', 'shot', 'fecha'));
    }

    public function cleoData(Request $request)
    {
        $pair = $request->pair;

        $cleo_data = DB::table('cleo_data')
            ->where('pair', $pair)
            ->orderBy('cleo_data.id', 'DESC')
            ->first();

        return response(["pair" => $cleo_data]);
    }

    public function cleoTabla(Request $request)
    {
        $eurusd = DB::table('cleo_data')->where('pair', "EURUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpusd = DB::table('cleo_data')->where('pair', "GBPUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $audusd = DB::table('cleo_data')->where('pair', "AUDUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdusd = DB::table('cleo_data')->where('pair', "NZDUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $usdcad = DB::table('cleo_data')->where('pair', "USDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $usdchf = DB::table('cleo_data')->where('pair', "USDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $usdjpy = DB::table('cleo_data')->where('pair', "USDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $eurgbp = DB::table('cleo_data')->where('pair', "EURGBP")->orderBy('cleo_data.id', 'DESC')->first();
        $euraud = DB::table('cleo_data')->where('pair', "EURAUD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurnzd = DB::table('cleo_data')->where('pair', "EURNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpaud = DB::table('cleo_data')->where('pair', "GBPAUD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpnzd = DB::table('cleo_data')->where('pair', "GBPNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $audnzd = DB::table('cleo_data')->where('pair', "AUDNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurcad = DB::table('cleo_data')->where('pair', "EURCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurchf = DB::table('cleo_data')->where('pair', "EURCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $eurjpy = DB::table('cleo_data')->where('pair', "EURJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpcad = DB::table('cleo_data')->where('pair', "GBPCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpchf = DB::table('cleo_data')->where('pair', "GBPCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpjpy = DB::table('cleo_data')->where('pair', "GBPJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $audcad = DB::table('cleo_data')->where('pair', "AUDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $audchf = DB::table('cleo_data')->where('pair', "AUDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $audjpy = DB::table('cleo_data')->where('pair', "AUDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdcad = DB::table('cleo_data')->where('pair', "NZDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdchf = DB::table('cleo_data')->where('pair', "NZDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdjpy = DB::table('cleo_data')->where('pair', "NZDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $cadchf = DB::table('cleo_data')->where('pair', "CADCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $cadjpy = DB::table('cleo_data')->where('pair', "CADJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $chfjpy = DB::table('cleo_data')->where('pair', "CHFJPY")->orderBy('cleo_data.id', 'DESC')->first();

        return view('cleo-tabla.show', compact('eurusd', 'gbpusd', 'audusd', 'nzdusd', 'usdcad', 'usdchf', 'usdjpy', 'eurgbp', 'euraud', 'eurnzd', 'gbpaud', 'gbpnzd', 'audnzd', 'eurcad', 'eurchf', 'eurjpy', 'gbpcad', 'gbpchf', 'gbpjpy', 'audcad', 'audchf', 'audjpy', 'nzdcad', 'nzdchf', 'nzdjpy', 'cadchf', 'cadjpy', 'chfjpy'));
    }

    public function cleoTablaShow(Request $request)
    {
        $eurusd = DB::table('cleo_data')->where('pair', "EURUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpusd = DB::table('cleo_data')->where('pair', "GBPUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $audusd = DB::table('cleo_data')->where('pair', "AUDUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdusd = DB::table('cleo_data')->where('pair', "NZDUSD")->orderBy('cleo_data.id', 'DESC')->first();
        $usdcad = DB::table('cleo_data')->where('pair', "USDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $usdchf = DB::table('cleo_data')->where('pair', "USDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $usdjpy = DB::table('cleo_data')->where('pair', "USDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $eurgbp = DB::table('cleo_data')->where('pair', "EURGBP")->orderBy('cleo_data.id', 'DESC')->first();
        $euraud = DB::table('cleo_data')->where('pair', "EURAUD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurnzd = DB::table('cleo_data')->where('pair', "EURNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpaud = DB::table('cleo_data')->where('pair', "GBPAUD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpnzd = DB::table('cleo_data')->where('pair', "GBPNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $audnzd = DB::table('cleo_data')->where('pair', "AUDNZD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurcad = DB::table('cleo_data')->where('pair', "EURCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $eurchf = DB::table('cleo_data')->where('pair', "EURCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $eurjpy = DB::table('cleo_data')->where('pair', "EURJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpcad = DB::table('cleo_data')->where('pair', "GBPCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpchf = DB::table('cleo_data')->where('pair', "GBPCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $gbpjpy = DB::table('cleo_data')->where('pair', "GBPJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $audcad = DB::table('cleo_data')->where('pair', "AUDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $audchf = DB::table('cleo_data')->where('pair', "AUDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $audjpy = DB::table('cleo_data')->where('pair', "AUDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdcad = DB::table('cleo_data')->where('pair', "NZDCAD")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdchf = DB::table('cleo_data')->where('pair', "NZDCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $nzdjpy = DB::table('cleo_data')->where('pair', "NZDJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $cadchf = DB::table('cleo_data')->where('pair', "CADCHF")->orderBy('cleo_data.id', 'DESC')->first();
        $cadjpy = DB::table('cleo_data')->where('pair', "CADJPY")->orderBy('cleo_data.id', 'DESC')->first();
        $chfjpy = DB::table('cleo_data')->where('pair', "CHFJPY")->orderBy('cleo_data.id', 'DESC')->first();

        return view('cleo-tabla.tabla', compact('eurusd', 'gbpusd', 'audusd', 'nzdusd', 'usdcad', 'usdchf', 'usdjpy', 'eurgbp', 'euraud', 'eurnzd', 'gbpaud', 'gbpnzd', 'audnzd', 'eurcad', 'eurchf', 'eurjpy', 'gbpcad', 'gbpchf', 'gbpjpy', 'audcad', 'audchf', 'audjpy', 'nzdcad', 'nzdchf', 'nzdjpy', 'cadchf', 'cadjpy', 'chfjpy'));
    }
}