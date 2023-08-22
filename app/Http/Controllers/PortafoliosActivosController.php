<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PortafolioActivo;

class PortafoliosActivosController extends Controller
{

    
    public function index()
    {

  
        return response()->view('portafolios_activos.show');
    }

    public function getTrader(Request $request)
    {
       
    }

    public function getPruebasVida()
    {
       $portafolios =  DB::table('portafolios')

        ->select('value')
        ->groupBy('value')
        ->orderBy('value','asc')
        ->get();
      
       

        $data = array(
            "portafolios" => $portafolios,
        );

        return response()->view('portafolios_activos.pruebavida', $data, 200);
    }
}
