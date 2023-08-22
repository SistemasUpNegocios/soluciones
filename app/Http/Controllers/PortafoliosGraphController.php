<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortafoliosGraphController extends Controller
{
    public function index()
    {
        return view('portafolioGraph.show');
    }

    public function getPortafolioGraph(Request $request)
    {
        
        $chartData = DB::table('portafolios')
            ->where('value', $request->portafolioGraph)
            // ->whereBetween('time', [$request->inicio, $request->fin])
            ->get();

        return response(['chartData' => $chartData]);
    }
}
