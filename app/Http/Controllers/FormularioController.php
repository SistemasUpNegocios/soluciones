<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Trader;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    public function index()
    {

        return view('formulario.show');
        
    }

    public function getFormulario()
    {

        $valores_moneda = DB::table('valores_moneda')->select()->orderBy('id', 'DESC')->get();

        $data = array();

        foreach($valores_moneda->unique('moneda') as $valor_moneda){
            array_push($data, $valor_moneda);
        }

        return datatables()->of($data)->addColumn('type', 'formulario.type')->addColumn('hora', 'formulario.fecha')->rawColumns(['type', 'hora'])->toJson();

    }

    public function solicitarOperacion(Request $request)
    {
        $solicitud = new Solicitud;
        $solicitud->clave = "operacion";
        $solicitud->status = "pendiente";
        $solicitud->trader_id = 100000;
        $solicitud->comentario = "$request->moneda, $request->type, $request->valor, $request->sl";

        $solicitud->save();

        return response($solicitud);
    }

}
