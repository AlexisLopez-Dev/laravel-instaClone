<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function authenticate(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Si el correo y clave coinciden en la BBDD...
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate(); // Seguridad
            return redirect()->route('fotos.index');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
