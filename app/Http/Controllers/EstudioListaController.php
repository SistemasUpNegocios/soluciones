<?php

namespace App\Http\Controllers;


use App\Models\Estudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudioListaController extends Controller
{
    public function index()
    {
        $estudio_lista = DB::table("estudio_lista")
        ->orderBy('id', 'asc')
        ->get();

        return view('estudio_lista.show', compact('estudio_lista'));
    }

    public function editEstudio(Request $request)
    {

        if ($request->ajax()) {
            
            $request->validate([
                'id' => 'required',
                'nombre' => 'required',
                'redaccion' => 'required',
            ]);

            $estudio = Estudio::find($request->id);
            $estudio->nombre = $request->input('nombre');
            $estudio->redaccion = $request->input('redaccion');
         

            $estudio->update();

            return response($estudio);
        }
    }

    public function addEstudio(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'nombre' => 'required',
                'redaccion' => 'required',
            ]);

            $estudio = new estudio;
            $estudio->nombre = $request->input('nombre');
            $estudio->redaccion = $request->input('redaccion');

            $estudio->save();
           
            return response($estudio);
            
        }
    }

    public function getLista(Request $request)
    {
        $estudios_lista = DB::table("estudio_lista")
        ->orderBy('id', 'asc')
        ->get();

        return datatables()->of($estudios_lista)->addColumn('btn', 'estudio_lista.buttons')->rawColumns(['btn'])->toJson();
    }

    public function deleteEstudio(Request $request)
    {
        if ($request->ajax()) {
            $estudio_id = $request->id;

            Estudio::destroy($request->id);
            
        }
    }
}
