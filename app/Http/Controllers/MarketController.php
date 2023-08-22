<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index()
    {
        return view('market.show');
    }

    public function getMarket(Request $request)
    {
        $market = Market::select()
            ->where('symbol', $request->par)
            ->whereBetween('time', [$request->inicio, $request->fin])
            ->get();
        
        return response(['market' => $market]);
    }
}
