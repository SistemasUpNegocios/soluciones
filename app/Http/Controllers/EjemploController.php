<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EjemploController extends Controller
{
   public function index()
   {
      return view('ejemplo.show');
   }

   public function index3()
   {
      return view('ejemplo.showejemplo3');
   }

   public function getEditEjemplo3(Request $request)
   {
      $solicitud = Solicitud::find($request->id);
      $solicitud->comentario = $request->comentario;
      $solicitud->save();

      return response()->json($solicitud);
   }
}