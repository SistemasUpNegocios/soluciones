<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \PDF;
set_time_limit(300);


class MagicOperacionController extends Controller
{
    public function index(Request $request)
    {
        return view('magicnumber.show');
    }



    public function getDatos(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");
        
        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '40%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero,
        );

        return response()->view('magicnumber.tabla', $data, 200);
    }

    public function getDatos403(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '403%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero
        );

        return response()->view('magicnumber.tabla', $data, 200);
    }

    public function getDatos404(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '404%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero
        );

        return response()->view('magicnumber.tabla', $data, 200);
    }

    public function getDatos405(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '405%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero

        );

        return response()->view('magicnumber.tabla', $data, 200);
    }

    public function getPDF(Request $request)
    {

        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");
        
        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '40%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '40%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero,
        );
    
        $pdf = PDF::loadView('magicnumber.imprimir', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('magicnumber.pdf');
    }

    public function getPDF403(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '403%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '403%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero
        );

         $pdf = PDF::loadView('magicnumber.imprimir', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('magicnumber403.pdf');
    }

    public function getPDF404(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '404%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '404%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero
        );

         $pdf = PDF::loadView('magicnumber.imprimir', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('magicnumber404.pdf');
    }

    public function getPDF405(Request $request)
    {
        $valores_moneda = array("EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "USDCAD", "USDCHF", "USDJPY", "EURGBP", "EURAUD", "EURNZD", "GBPAUD", "GBPNZD", "AUDNZD", "EURCAD", "EURCHF", "EURJPY", "GBPCAD", "GBPCHF", "GBPJPY", "AUDCAD", "AUDCHF", "AUDJPY", "NZDCAD", "NZDCHF", "NZDJPY", "CADCHF", "CADJPY", "CHFJPY");

        $magiceurusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('magicnumber', 'like', '405%')
            ->where('symbol', '=', $valores_moneda[0])
            ->where("trader_id", $request->id)
            ->orderBy('serie_magic', 'ASC')
            ->get();

        $magicgbpusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[1])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[2])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdusd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[3])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[4])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[5])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicusdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[6])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurgbp = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[7])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceuraud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[8])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[9])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpaud = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[10])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[11])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudnzd = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[12])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[13])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[14])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiceurjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[15])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[16])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[17])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicgbpjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[18])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[19])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[20])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicaudjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[21])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdcad = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[22])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[23])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicnzdjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[24])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadchf = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[25])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magiccadjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[26])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $magicchfjpy = DB::table('operaciones')
            ->select(DB::raw('*, SUBSTRING(magicnumber, 7, 1) AS serie_magic'))
            ->where('symbol', '=', $valores_moneda[27])
            ->where("trader_id", $request->id)
            ->where('magicnumber', 'like', '405%')
            ->orderBy('magicnumber', 'ASC')
            ->get();

        $nombre_trader = DB::table('traders')
            ->select()
            ->where("id", $request->id)
            ->first();

        $traders = DB::table('operaciones')
            ->select()
            ->where("trader_id", $request->id)
            ->count();


        if ($traders > 0) {
            $condicional = true;
        } else {
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "nombre_trader" => $nombre_trader,
            "magiceurusd" => $magiceurusd,
            "magicgbpusd" => $magicgbpusd,
            "magicaudusd" => $magicaudusd,
            "magicnzdusd" => $magicnzdusd,
            "magicusdcad" => $magicusdcad,
            "magicusdchf" => $magicusdchf,
            "magicusdjpy" => $magicusdjpy,
            "magiceurgbp" => $magiceurgbp,
            "magiceuraud" => $magiceuraud,
            "magiceurnzd" => $magiceurnzd,
            "magicgbpaud" => $magicgbpaud,
            "magicgbpnzd" => $magicgbpnzd,
            "magicaudnzd" => $magicaudnzd,
            "magiceurcad" => $magiceurcad,
            "magiceurchf" => $magiceurchf,
            "magiceurjpy" => $magiceurjpy,
            "magicgbpcad" => $magicgbpcad,
            "magicgbpchf" => $magicgbpchf,
            "magicgbpjpy" => $magicgbpjpy,
            "magicaudcad" => $magicaudcad,
            "magicaudchf" => $magicaudchf,
            "magicaudjpy" => $magicaudjpy,
            "magicnzdcad" => $magicnzdcad,
            "magicnzdchf" => $magicnzdchf,
            "magicnzdjpy" => $magicnzdjpy,
            "magiccadchf" => $magiccadchf,
            "magiccadjpy" => $magiccadjpy,
            "magicchfjpy" => $magicchfjpy,
            "trader_id" => $request->id,
            "numero" => $request->numero

        );

         $pdf = PDF::loadView('magicnumber.imprimir', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('magicnumber405.pdf');
    }

    
   }