<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClaveInversor;

class ClaveInversorController extends Controller
{
    public function index()
    {
        return view('clave_inversor.show');
    }

    public function getClaveInversor()
    {
        $claveInversor = DB::table("clave_inversor")
        ->orderBy('id', 'asc')
        ->get();

        return datatables()->of($claveInversor)
        ->addColumn('btn', 'clave_inversor.buttons')
        ->addColumn('correo', 'clave_inversor.correo')
        ->addColumn('telefono', 'clave_inversor.telefono')
        ->rawColumns(['btn', 'correo', 'telefono'])
        ->toJson();
    }

    public function addClaveInversor(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
               
                'correo' => 'required',
                'telefono' => 'required'
            ]);

            $claveInversor = new claveInversor;
            $claveInversor->nombre_cliente = $request->input('nombre');
            $claveInversor->correo = $request->input('correo');
            $claveInversor->telefono = $request->input('telefono');

            $claveInversor->save();
           
            return response($claveInversor);
            
        }
    }

    public function deleteClaveInversor(Request $request)
    {
        if ($request->ajax()) {
            $claveInversor_id = $request->id;
            ClaveInversor::destroy($request->id);
        }
    }

}
