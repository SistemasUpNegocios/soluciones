<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class PortafoliosGraphController2023 extends Controller

{

    public function index()
    {

        return view('portafolioGraph2023.show');

    }



    public function getPortafolioGraph2023(Request $request)

    {
        $chartData = DB::table('portafolios')

            ->where('value', $request->portafolioGraph)

            // ->whereBetween('time', [$request->inicio, $request->fin])

            ->get();



        return response(['chartData' => $chartData]);

    }

}

