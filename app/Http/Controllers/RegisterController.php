<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->to('/admin/dashboard');
        } else {
            return view('auth.register');
        }
    }

    public function store()
    {
        $user = User::create(request(['nombre', 'correo', 'password']));

        auth()->login($user);
        return redirect()->to('/admin/dashboard');
    }
}
