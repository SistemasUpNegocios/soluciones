<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Switcher;
use App\Models\Trader;
use App\Models\Box;
use App\Models\TablaLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotonController extends Controller
{
    public function index()
    {
        $switchers = DB::table("switcher")
        ->where('type','equity')
        ->get();

      

        return view('botones.show',compact('switchers'));
    }
    public function botonUSDH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_usd") {
            if ($switcher->status_usd == "activado") {
                $switcher->status_usd = "desactivado";
               
            }else{
                $switcher->status_usd = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_usd") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonEURH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_eur") {
            if ($switcher->status_eur == "activado") {
                $switcher->status_eur = "desactivado";
               
            }else{
                $switcher->status_eur = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_eur") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonGBPH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_gbp") {
            if ($switcher->status_gbp == "activado") {
                $switcher->status_gbp = "desactivado";
               
            }else{
                $switcher->status_gbp = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_gbp") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonAUDH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_aud") {
            if ($switcher->status_aud == "activado") {
                $switcher->status_aud = "desactivado";
               
            }else{
                $switcher->status_aud = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_aud") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonNZDH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_nzd") {
            if ($switcher->status_nzd == "activado") {
                $switcher->status_nzd = "desactivado";
               
            }else{
                $switcher->status_nzd = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_nzd") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonCADH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_cad") {
            if ($switcher->status_cad == "activado") {
                $switcher->status_cad = "desactivado";
               
            }else{
                $switcher->status_cad = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_cad") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonCHFH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_chf") {
            if ($switcher->status_chf == "activado") {
                $switcher->status_chf = "desactivado";
               
            }else{
                $switcher->status_chf = "activado";
             
            }
        }

        $switcher->save();
        
        if ($request->campo != "status_chf") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }

    public function botonJPYH(Request $request)
    {
        $switcher = Switcher::find($request->id);
        
        if ($request->campo == "status_jpy") {
            if ($switcher->status_jpy == "activado") {
                $switcher->status_jpy = "desactivado";
               
            }else{
                $switcher->status_jpy = "activado";
             
            }
         
        }

        $switcher->save();
        
        if ($request->campo != "status_jpy") {            
            $solicitud->save();
        }

    
        $switchers = DB::table("switcher")
        ->where('type','equity')
       ->get();


        $switcher_id = $switcher->id;
        $bitacora_id = session('bitacora_id');
        
        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Botones";
        $log->id_tabla = $switcher_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();

    
       
    }
   
   

    public function boton1()
    {

        //Aquí va el código para el botón 1, si quieres llamar a la Base de datos puedes tomar el ejemplo de alguún controlador. (Borra el echo).
        echo "Botón 1";
        
    }

    public function boton2()
    {
        
    }

    public function boton3()
    {
        
    }

    public function boton4()
    {
        
    }

    public function boton5()
    {
        
    }

    public function boton6()
    {
        
    }

    public function boton7()
    {
        
    }

    public function boton8()
    {
        
    }

    public function boton9()
    {
        
    }

    public function boton10()
    {
        
    }

    public function boton11()
    {
        
    }

    public function boton12()
    {
        
    }

   

    public function boton14()
    {
        
    }

    public function boton15()
    {
        
    }

    public function boton16()
    {
        
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

}