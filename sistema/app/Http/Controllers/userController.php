<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function loginCliente(Request $request)
    {
        $datos = $request->validateWithBag('clienteLogin', [
            'nom_usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $rolCliente = Rol::where('nom_rol', 'Cliente')->first();

        if (!$rolCliente) {
            return back()
                ->withErrors([
                    'nom_usuario' => 'El rol Cliente no esta configurado en el sistema.',
                ], 'clienteLogin')
                ->onlyInput('nom_usuario');
        }

        $credenciales = [
            'nom_usuario' => $datos['nom_usuario'],
            'password' => $datos['password'],
            'id_rol' => $rolCliente->id_rol,
        ];

        if (Auth::attempt($credenciales, $request->boolean('recordarme'))) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return back()
            ->withErrors([
                'nom_usuario' => 'El usuario o la contrasena no son correctos.',
            ], 'clienteLogin')
            ->onlyInput('nom_usuario');
    }

    public function registerCliente(Request $request)
    {
        $datos = $request->validateWithBag('clienteRegistro', [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'nom_usuario' => 'required|string|max:100|unique:users,nom_usuario',
            'celular' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nom_usuario.unique' => 'Este usuario ya esta registrado.',
            'password.confirmed' => 'La confirmacion de contrasena no coincide.',
        ]);

        $rolCliente = Rol::firstOrCreate(['nom_rol' => 'Cliente']);
        $datos['id_rol'] = $rolCliente->id_rol;
        

        User::create($datos);

        return redirect()->route('clientes.login.form')
            ->with('mensaje', 'Cuenta creada correctamente. Ahora puedes iniciar sesion.');
    }

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
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

        $usuarios = User::with('rol')
            ->orderBy('id', 'desc')
            ->get();

        return view('Cuenta.indexCuenta', compact('usuarios'));
    }

    public function createCuenta()
    {
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

        $roles = Rol::orderBy('id_rol')->get();

        return view('Cuenta.FormCuenta', compact('roles'));
    }

    public function storeCuenta(Request $request)
    {
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

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

    public function editCuenta(User $usuario)
    {
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

        $roles = Rol::orderBy('id_rol')->get();

        return view('Cuenta.EditCuenta', compact('usuario', 'roles'));
    }

    public function updateCuenta(Request $request, User $usuario)
    {
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

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
            'id_rol' => 'required|exists:roles,id_rol',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'nom_usuario.unique' => 'Este usuario ya esta registrado.',
            'password.confirmed' => 'La confirmacion de contraseña no coincide.',
        ]);

        if (blank($datos['password'])) {
            unset($datos['password']);
        }

        $usuario->update($datos);

        return redirect()->route('cuentas.index')
            ->with('mensaje', 'Cuenta actualizada correctamente.');
    }

    public function destroyCuenta(User $usuario)
    {
        if ($respuesta = $this->bloquearGestionCuentasParaGerente()) {
            return $respuesta;
        }

        if ($usuario->id === Auth::id()) {
            return redirect()->route('cuentas.index')
                ->with('error', 'No puedes eliminar tu propia cuenta mientras estas usando el sistema.');
        }

        $usuario->delete();

        return redirect()->route('cuentas.index')
            ->with('mensaje', 'Cuenta eliminada correctamente.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
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

    private function bloquearGestionCuentasParaGerente()
    {
        if (Auth::user()?->rol?->nom_rol !== 'Gerente') {
            return null;
        }

        return redirect()->route('perfil.edit')
            ->with('error', 'Tu rol solo permite gestionar destinos, hoteles y tu cuenta personal.');
    }
}
