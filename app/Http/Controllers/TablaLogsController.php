<?php

namespace App\Http\Controllers;

use App\Models\TablaLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TablaLogsController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function index()
    {
    
        return view('tablalogs.show');
       
    }

    public function getTablaLogs()
    {
        $tablalogs = DB::table('tabla_logs')
        ->join('bitacora_acceso', 'bitacora_acceso.id', '=', 'tabla_logs.bitacora_id')
        ->join('users', 'users.id', '=', 'bitacora_acceso.user_id')
        ->select(DB::raw("bitacora_acceso.id, bitacora_acceso.direccion_ip, bitacora_acceso.fecha_entrada, bitacora_acceso.fecha_salida, bitacora_acceso.dispositivo, bitacora_acceso.sistema_operativo, bitacora_acceso.navegador, bitacora_acceso.user_id, users.nombre AS user_nombre, users.correo AS user_correo, users.foto_perfil AS user_fotoperfil, tabla_logs.hora_fecha, tabla_logs.tipo_accion, tabla_logs.tabla, tabla_logs.id AS logsid"))
        ->orderByDesc('tabla_logs.hora_fecha')
        ->get();

        return datatables()->of($tablalogs)->addColumn('tipos', 'tablalogs.tipos')->addColumn('btn', 'tablalogs.buttons')->rawColumns(['tipos', 'btn'])->toJson();
    }

    public function deleteTablaLogs(Request $request)
    {
        if ($request->ajax()) {
            TablaLog::destroy($request->id);
        }
    }
}
