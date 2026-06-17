<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;

Route::get('/', function () {
    return view('index');
});

Route::get('/iniciarSesion', function () {
    return view('iniciarSesion');
});

Route::get('/portalEmpleados', function () {
    return view('portalEmpleados');
});

Route::get('/PerfilUsuario', function () {
    return view('PerfilUsuario');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::resource('destinos', DestinoController::class);
