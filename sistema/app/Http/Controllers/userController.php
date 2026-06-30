<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'nom_usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $recordarme = $request->boolean('recordarme');

        if (Auth::attempt($credenciales, $recordarme)) {
            $request->session()->regenerate();

            return redirect()->intended('/PerfilUsuario');
        }

        return back()
            ->withErrors([
                'nom_usuario' => 'El usuario o la contrasena no son correctos.',
            ])
            ->onlyInput('nom_usuario');
    }
}
