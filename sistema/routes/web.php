<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('index');
});

Route::get('/iniciarSesion', function () {
    return view('iniciarSesion');
});

Route::get('/portalEmpleados', function () {
    return view('portalEmpleados');
})->name('login');

Route::post('/portalEmpleados/login', [userController::class, 'login'])->name('portalEmpleados.login');

Route::get('/PerfilUsuario', function () {
    return view('PerfilUsuario');
})->middleware('auth');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/destinos', [DestinoController::class, 'listarDestinos'])->name('destinos.index');
Route::get('/destinos/search', [DestinoController::class, 'searchDestinos'])->name('destinos.search');
Route::get('/destinos/create', [DestinoController::class, 'createDestino'])->name('destinos.create');
Route::post('/destinos', [DestinoController::class, 'storeDestino'])->name('destinos.store');
Route::get('/destinos/{destino}', [DestinoController::class, 'showDestino'])->name('destinos.show');
Route::get('/destinos/{destino}/edit', [DestinoController::class, 'editDestino'])->name('destinos.edit');
Route::put('/destinos/{destino}', [DestinoController::class, 'updateDestino'])->name('destinos.update');
Route::patch('/destinos/{destino}', [DestinoController::class, 'updateDestino'])->name('destinos.update');
Route::delete('/destinos/{destino}', [DestinoController::class, 'destroyDestino'])->name('destinos.destroy');

Route::get('/hoteles', [HotelController::class, 'listarHoteles'])->name('hoteles.index');
Route::get('/hoteles/search', [HotelController::class, 'searchHoteles'])->name('hoteles.search');
Route::get('/hoteles/create', [HotelController::class, 'createHotel'])->name('hoteles.create');
Route::post('/hoteles', [HotelController::class, 'storeHotel'])->name('hoteles.store');
Route::get('/hoteles/{hotel}', [HotelController::class, 'showHotel'])->name('hoteles.show');
Route::get('/hoteles/{hotel}/edit', [HotelController::class, 'editHotel'])->name('hoteles.edit');
Route::put('/hoteles/{hotel}', [HotelController::class, 'updateHotel'])->name('hoteles.update');
Route::patch('/hoteles/{hotel}', [HotelController::class, 'updateHotel'])->name('hoteles.update');
Route::delete('/hoteles/{hotel}', [HotelController::class, 'destroyHotel'])->name('hoteles.destroy');

Route::get('/servicios', [ServicioController::class, 'listarServicios'])->name('servicios.index');
Route::get('/servicios/search', [ServicioController::class, 'searchServicios'])->name('servicios.search');
Route::get('/servicios/create', [ServicioController::class, 'createServicio'])->name('servicios.create');
Route::post('/servicios', [ServicioController::class, 'storeServicio'])->name('servicios.store');
Route::get('/servicios/{servicio}', [ServicioController::class, 'showServicio'])->name('servicios.show');
Route::get('/servicios/{servicio}/edit', [ServicioController::class, 'editServicio'])->name('servicios.edit');
Route::put('/servicios/{servicio}', [ServicioController::class, 'updateServicio'])->name('servicios.update');
Route::patch('/servicios/{servicio}', [ServicioController::class, 'updateServicio'])->name('servicios.update');
Route::delete('/servicios/{servicio}', [ServicioController::class, 'destroyServicio'])->name('servicios.destroy');
