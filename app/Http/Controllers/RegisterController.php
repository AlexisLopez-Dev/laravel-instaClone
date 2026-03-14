<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request) {
        // 1. Validar
        $validado = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Crear usuario (Laravel encriptará la clave por el cast 'hashed' o tu mutador)
        $user = User::create($validado);

        // 3. Autenticar (loguear) directamente y redirigir
        Auth::login($user);
        return redirect()->route('fotos.index');
    }
}
