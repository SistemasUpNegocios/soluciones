<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Autorizacion;
use App\Models\TablaLog;





class AutorizacionS8AController extends Controller
{
    public function index()
    {
        return view('autorizacion.show');
    }

    public function getDatos(Request $request)
    {
    ini_set('memory_limit', '2048M');
    ini_set('max_execution_time', 300);



    $autorizaciones8a = DB::table('autorizacion_s8a')
    ->where("terminal", $request->terminal)
    // ->where("lotage", $request->PIP)
    ->get();


    if(sizeof($autorizaciones8a) > 0){
        $condicional = true;
    }else{
        $condicional = false;
    }

        $EURUSD = DB::table('market')
        ->select('swapshort', 'swaplong')
        ->where("symbol", "EURUSD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

      


        $GBPUSD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPUSD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

     

        $AUDUSD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "AUDUSD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $NZDUSD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "NZDUSD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $USDCAD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "USDCAD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $USDCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "USDCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();
      
        

        $USDJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "USDJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURGBP = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURGBP")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURAUD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURAUD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURNZD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURNZD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $GBPAUD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPAUD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $GBPNZD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPNZD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        
        $AUDNZD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "AUDNZD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURCAD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURCAD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $EURJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "EURJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $GBPCAD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPCAD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $GBPCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $GBPJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "GBPJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $AUDCAD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "AUDCAD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $AUDCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "AUDCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $AUDJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "AUDJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $NZDCAD = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "NZDCAD")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $NZDCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "NZDCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $NZDJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "NZDJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $CADCHF = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "CADCHF")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        
        $CADJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "CADJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $CHFJPY = DB::table('market')
        ->select(['swapshort', 'swaplong'])
        ->where("symbol", "CHFJPY")
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

        $data = array(
            "autorizaciones8a" => $autorizaciones8a,
            "EURUSD" => $EURUSD,
            "GBPUSD" => $GBPUSD,
            "AUDUSD" => $AUDUSD,
            "NZDUSD" => $NZDUSD,
            "USDCAD" => $USDCAD,
            "USDCHF" => $USDCHF,
            "USDJPY" => $USDJPY,
            "EURGBP" => $EURGBP,
            "EURAUD" => $EURAUD,
            "EURNZD" => $EURNZD,
            "GBPAUD" => $GBPAUD,
            "GBPNZD" => $GBPNZD,
            "AUDNZD" => $AUDNZD,
            "EURCAD" => $EURCAD,
            "EURCHF" => $EURCHF,
            "EURJPY" => $EURJPY,
            "GBPCAD" => $GBPCAD,
            "GBPCHF" => $GBPCHF,
            "GBPJPY" => $GBPJPY,
            "AUDCAD" => $AUDCAD,
            "AUDCHF" => $AUDCHF,
            "AUDJPY" => $AUDJPY,
            "NZDCAD" => $NZDCAD,
            "NZDCHF" => $NZDCHF,
            "NZDJPY" => $NZDJPY,
            "CADCHF" => $CADCHF,
            "CADJPY" => $CADJPY,
            "CHFJPY" => $CHFJPY,
            "condicional" => $condicional,
        );

        return response()->view('autorizacion.tabla', $data, 200);
    }

    public function actionAuth(Request $request)
    {
        $action = Autorizacion::find($request->id);
        
        if ($request->valor == 0) {
           $action->action= 0;
        }

        if ($request->valor == 1) {
            $action->action= 1;
         }

         if ($request->valor == 2) {
            $action->action= 2;
         }

         if ($request->valor == 3) {
            $action->action= 3;
         }

        $action->save();
               
    }

    public function botonStatus(Request $request)
    {
        if ($request->status == "activado") {
       Autorizacion::where('status', $request->status)
        ->update(['status' => 'desactivado']);
      
        }else{
            Autorizacion::where('status', $request->status)
            ->update(['status' => 'activado']);
           
        }
       
        $auth_id = 1;
        $bitacora_id = session('bitacora_id');

        $log = new TablaLog;
        $log->tipo_accion = "Actualización";
        $log->tabla = "Autorización S8A";
        $log->id_tabla = $auth_id;
        $log->bitacora_id = $bitacora_id;
        $log->save();
                
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

