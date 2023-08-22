<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        return view('status.show');
    }

    public function getDatos(Request $request)
    {
        $status_profit = DB::table('status_profit')
            ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_profit.fecha', 'DESC')
            ->first();

        $status_lotes = DB::table('status_lot')
            ->join('traders', 'traders.id', '=', 'status_lot.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_lot.fecha', 'DESC')
            ->first();

        $status_active = DB::table('status_active')
            ->join('traders', 'traders.id', '=', 'status_active.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_active.fecha', 'DESC')
            ->first();

        $status_profit2 = DB::table('status_profit')
            ->join('traders', 'traders.id', '=', 'status_profit.trader_id')
            ->select()
            ->where("trader_id", $request->id)
            ->orderBy('status_profit.fecha', 'DESC')
            ->get();

        if(sizeof($status_profit2) > 0){
            $condicional = true;
        }else{
            $condicional = false;
        }

        $data = array(
            "condicional" => $condicional,
            "status_profit" => $status_profit,
            "status_lotes" => $status_lotes,
            "status_active" => $status_active,
        );

        return response()->view('status.tabla', $data, 200);
    }

}