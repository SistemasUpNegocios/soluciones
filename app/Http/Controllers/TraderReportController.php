<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TraderReportController extends Controller
{
    public function index()
    {
        
        return view('traderreport.show');

    }

    public function showResults()
    {
        return redirect('/admin/dashboard');
        $traders = DB::table('traders')
        ->orderByDesc(DB::raw('FIELD(id, 99998, 99999)'))
        ->get();

        return view('traderreport.showResults', compact("traders"));
    }

    public function getReport(Request $request)
    {
            $traders = General::select()
            ->whereRaw('fecha > NOW() - INTERVAL 1 HOUR AND trader_id = ' . $request->id)
            ->get();

            $tradersNombre = Trader::select()->where('id', $request->id)->get();
            return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);   
    }

    public function getReportResult(Request $request)
    {
        $fromDate = Carbon::parse($request->inicio)->format('Y-m-d H:i:s');
        $toDate = Carbon::parse($request->fin)->format('Y-m-d H:i:s');
        $traderID = $request->input('id');

        $traders = General::select()
        ->whereBetween("fecha", [$fromDate, $toDate])
        ->where('trader_id', 22)
        ->get();

        $tradersNombre = Trader::select()->where('id', $traderID)->get();
        return response(['traders' => $traders, 'tradersNombre' => $tradersNombre]);
    }
}