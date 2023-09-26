<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PortafolioActivo;

class PortafoliosActivosController2023 extends Controller
{

    
    public function index()
    {

  
        return response()->view('portafolios_activos2023.show');
    }

    public function getTrader2023(Request $request)
    {
       
    }

    public function getPruebasVida2023()
    {
       $portafolios =  DB::table('portafolios')
        ->select('value')
        ->where('value','=','202301')
        ->orWhere('value','=','202302')
        ->orWhere('value','=','202303')
        ->orWhere('value','=','202304')
        ->groupBy('value')
        ->orderBy('value','asc')
        ->get();
      
       

        $data = array(
            "portafolios" => $portafolios,
        );

        return response()->view('portafolios_activos2023.pruebavida', $data, 200);
    }
}
