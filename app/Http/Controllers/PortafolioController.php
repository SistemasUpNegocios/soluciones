<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortafolioController extends Controller
{
    public function index()
    {
        return view('portafolio.show');
    }

    public function getPortafolio(Request $request)
    {
        
        $portafolio = DB::table('prueba')
            ->select('valor', 'rendimiento')
            ->where('portafolio', $request->portafolio)
            ->whereBetween('time', [$request->inicio, $request->fin])
            ->get();

        return response(['portafolio' => $portafolio]);
    }
}
