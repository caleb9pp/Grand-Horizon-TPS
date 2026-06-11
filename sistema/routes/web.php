<?php

use Illuminate\Support\Facades\Route;

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
        $destinos = [
        'Cancún',
        'Los Cabos',
        'Puerto Vallarta'
    ];

    return view('PerfilUsuario', compact('destinos'));
});

Route::get('/prueba', function () {
    return view('prueba');
});