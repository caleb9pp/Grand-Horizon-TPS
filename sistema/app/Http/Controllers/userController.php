<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function login(Request $request)
    {
        $datos = $request->validate([
            'nom_usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
            'departamento' => ['required', 'exists:roles,id_rol'],
        ], [
            'departamento.required' => 'Selecciona un departamento.',
            'departamento.exists' => 'Selecciona un departamento valido.',
        ]);

        $rol = Rol::find($datos['departamento']);
        $recordarme = $request->boolean('recordarme');
        $credenciales = [
            'nom_usuario' => $datos['nom_usuario'],
            'password' => $datos['password'],
            'id_rol' => $rol->id_rol,
        ];

        if ($rol && Auth::attempt($credenciales, $recordarme)) {
            $request->session()->regenerate();

            return redirect()->intended('/PerfilUsuario');
        }

        return back()
            ->withErrors([
                'nom_usuario' => 'El usuario, la contrasena o el departamento no son correctos.',
            ])
            ->onlyInput('nom_usuario', 'departamento');
    }

    public function listarCuentas()
    {
        $usuarios = User::with('rol')
            ->orderBy('id', 'desc')
            ->get();

        return view('Cuenta.indexCuenta', compact('usuarios'));
    }

    public function createCuenta()
    {
        $roles = Rol::orderBy('id_rol')->get();

        return view('Cuenta.FormCuenta', compact('roles'));
    }

    public function storeCuenta(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'nom_usuario' => 'required|string|max:100|unique:users,nom_usuario',
            'celular' => 'required|string|max:20',
            'id_rol' => 'required|exists:roles,id_rol',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nom_usuario.unique' => 'Este usuario ya esta registrado.',
            'password.confirmed' => 'La confirmacion de contrasena no coincide.',
        ]);

        User::create($datos);

        return redirect()->route('cuentas.index')
            ->with('mensaje', 'Cuenta creada correctamente.');
    }

    public function editPerfil()
    {
        $usuario = User::with('rol')->findOrFail(Auth::id());

        return view('perfilCuenta', compact('usuario'));
    }

    public function updatePerfil(Request $request)
    {
        $usuario = User::findOrFail(Auth::id());

        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'nom_usuario' => [
                'required',
                'string',
                'max:100',
                Rule::unique('users', 'nom_usuario')->ignore($usuario->id),
            ],
            'celular' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'nom_usuario.unique' => 'Este usuario ya esta registrado.',
            'password.confirmed' => 'La confirmacion de contrasena no coincide.',
        ]);

        if (blank($datos['password'])) {
            unset($datos['password']);
        }

        $usuario->update($datos);

        return redirect()->route('perfil.edit')
            ->with('mensaje', 'Tu informacion se actualizo correctamente.');
    }
}
