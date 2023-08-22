<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Solicitud;
use App\Models\TablaLog;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraderController extends Controller
{
    public function index()
    {
        $traders = DB::table("traders")
        ->where('id','=',99999)
        ->orWhere('id','=',99998)
        ->orWhere('id','=',99997)
        ->orWhere('id','=',21)
        ->orWhere('id','=',22)
        ->orWhere('id','=',23)
        ->orWhere('id','=',24)
        ->orderByDesc(DB::raw('FIELD(id, 99997, 99998, 99999)'))->get();

        return view('traders.show', compact('traders'));
    }

    public function getClave(Request $request)
    {
        $clave = DB::table('users')->where("id", "=", auth()->user()->id)->first();
        if (\Hash::check($request->clave, $clave->password)) {                
            return response("success");
        }else{
            return response("error");
        }
    }

    public function editStatus(Request $request)
    {

        $solicitud = new Solicitud;
        $solicitud->status = "pendiente";
        $solicitud->comentario = $request->campo;

        $trader = Trader::find($request->id);
        
        if ($request->campo == "modificable") {
            if ($trader->modificable == "activado") {
                $trader->modificable = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->modificable = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "activado"){
            if ($trader->activado == "activado") {
                $trader->activado = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->activado = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "sl"){
            if($trader->sl == "activado"){
                $trader->sl = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->sl = "activado";
                $solicitud->clave = "activado";
            }
        }else if($request->campo == "tp"){
            if($trader->tp == "activado"){
                $trader->tp = "desactivado";
                $solicitud->clave = "desactivado";
            }else{
                $trader->tp = "activado";
                $solicitud->clave = "activado";
            }
        }

        $trader->save();
        
        $solicitud->trader_id = $trader->id;
        if ($request->campo != "modificable") {            
            $solicitud->save();
        }

        // $traders = DB::table("traders")
        // ->where("id", "!=", 998)
        // ->where("id", "!=", 999)
        // ->where("id", "!=", 1000)
        // ->orderByDesc(DB::raw('FIELD(id, 22, 99998, 99999)'))->get();

        $traders = DB::table("traders")
        ->where('id','=',99999)
        ->orWhere('id','=',99998)
        ->orWhere('id','=',99997)
        ->orWhere('id','=',21)
        ->orWhere('id','=',22)
        ->orWhere('id','=',23)
        ->orWhere('id','=',24)
        ->orderByDesc(DB::raw('FIELD(id, 99997, 99998, 99999)'))->get();

        $trader_id = $trader->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Traders";
        $log->id_tabla = $trader_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();


        return response()->view('traders.buttons', compact('traders'));
    }

    public function addTrader(Request $request)
    {
        $trader = new Trader;
        $trader->id = $request->numero;
        $trader->nombre = "Trader ".$request->numero;
        $trader->save();

        // $trader_id = $trader->id;
        // $bitacora_id = session('bitacora_id');
        
        // $log = new TablaLog;
        // $log->tipo_accion = "Inserción";
        // $log->tabla = "Traders";
        // $log->id_tabla = $trader_id;
        // $log->bitacora_id = $bitacora_id;
        // $log->save();

        return($trader);
    }

    public function getTrader(Request $request)
    {
        // $traders = DB::table("traders")
        // ->where("id", "!=", 998)
        // ->where("id", "!=", 999)
        // ->where("id", "!=", 1000)
        // ->orderByDesc(DB::raw('FIELD(id, 22, 99998, 99999)'))->get();

        $traders = DB::table("traders")
        ->where('id','=',99999)
        ->orWhere('id','=',99998)
        ->orWhere('id','=',99997)
        ->orWhere('id','=',21)
        ->orWhere('id','=',22)
        ->orWhere('id','=',23)
        ->orWhere('id','=',24)
        ->orderByDesc(DB::raw('FIELD(id, 99997, 99998, 99999)'))->get();


        return response()->view('traders.buttons', compact('traders'));
    }
}