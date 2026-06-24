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

Route::get('/destinos', [DestinoController::class, 'listarDestinos'])->name('destinos.index');
Route::get('/destinos/create', [DestinoController::class, 'createDestino'])->name('destinos.create');
Route::post('/destinos', [DestinoController::class, 'storeDestino'])->name('destinos.store');
Route::get('/destinos/{destino}', [DestinoController::class, 'showDestino'])->name('destinos.show');
Route::get('/destinos/{destino}/edit', [DestinoController::class, 'editDestino'])->name('destinos.edit');
Route::put('/destinos/{destino}', [DestinoController::class, 'updateDestino'])->name('destinos.update');
Route::patch('/destinos/{destino}', [DestinoController::class, 'updateDestino'])->name('destinos.update');
Route::delete('/destinos/{destino}', [DestinoController::class, 'destroyDestino'])->name('destinos.destroy');
