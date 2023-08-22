<?php

namespace App\Http\Controllers;

use App\Models\BitacoraAcceso;
use App\Http\Controllers\BitacoraAccesoController;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;


class SessionController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->to('/admin/dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function store()
    {
        if (auth()->attempt(request(['correo', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Datos incorrectos, intenta de nuevo'
            ]);
        }
        
        $fecha_entrada = Carbon::now();
        $fecha_entrada->toDateTimeString();

        $bitacoraAcceso = new BitacoraAcceso;
        $bitacoraAcceso->direccion_ip = request()->ip();
        $bitacoraAcceso->fecha_entrada = $fecha_entrada;

        $fecha_salida = Carbon::parse($fecha_entrada);
        // La cookie de sesión expira en 120 minutos desde que se inicia sesión (este valor cambiará a menos que el usuario cierre esta sesión antes)
        $fecha_salida->addMinutes(120);
        $fecha_salida->toDateTimeString();

        $bitacoraAcceso->fecha_salida = $fecha_salida;
        $bitacoraAcceso->dispositivo = BitacoraAccesoController::get_dispositivo();
        $bitacoraAcceso->sistema_operativo = BitacoraAccesoController::get_sistema_operativo();
        $bitacoraAcceso->navegador = BitacoraAccesoController::get_navegador();
        $bitacoraAcceso->user_id = auth()->user()->id;

        $bitacoraAcceso->save();

        $bitacoraAcceso_id = $bitacoraAcceso->id;

        session(['bitacora_id' => $bitacoraAcceso_id]);

        return redirect()->to('/admin/dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        $bitacoraAcceso_id = session('bitacora_id');

        $bitacoraAcceso = BitacoraAcceso::find($bitacoraAcceso_id);

        $fecha_salida = Carbon::now()->toDateTimeString();

        $bitacoraAcceso->fecha_salida = $fecha_salida;

        $bitacoraAcceso->update();

        return redirect()->to('/');
    }
}
