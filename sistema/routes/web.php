<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/iniciarSesion', function () {
    return view('iniciarSesion');
})->name('clientes.login.form');

Route::post('/iniciarSesion', [userController::class, 'loginCliente'])->name('clientes.login');
Route::get('/registrarse', function () {
    return view('registrarse');
})->name('clientes.register.form');
Route::post('/registrarse', [userController::class, 'registerCliente'])->name('clientes.register');

Route::get('/portalEmpleados', function () {
    $roles = \App\Models\Rol::where('nom_rol', '!=', 'Cliente')
        ->orderBy('id_rol')
        ->get();

    return view('portalEmpleados', compact('roles'));
})->name('login');

Route::post('/portalEmpleados/login', [userController::class, 'login'])->name('portalEmpleados.login');

Route::get('/PerfilUsuario', function () {
    return view('PerfilUsuario');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/mi-perfil', [userController::class, 'editPerfil'])->name('perfil.edit');
    Route::put('/mi-perfil', [userController::class, 'updatePerfil'])->name('perfil.update');
    Route::post('/cerrar-sesion', [userController::class, 'logout'])->name('logout');

    Route::get('/cuentas', [userController::class, 'listarCuentas'])->name('cuentas.index');
    Route::get('/cuentas/create', [userController::class, 'createCuenta'])->name('cuentas.create');
    Route::post('/cuentas', [userController::class, 'storeCuenta'])->name('cuentas.store');
    Route::get('/cuentas/{usuario}/edit', [userController::class, 'editCuenta'])->name('cuentas.edit');
    Route::put('/cuentas/{usuario}', [userController::class, 'updateCuenta'])->name('cuentas.update');
    Route::patch('/cuentas/{usuario}', [userController::class, 'updateCuenta'])->name('cuentas.update');
    Route::delete('/cuentas/{usuario}', [userController::class, 'destroyCuenta'])->name('cuentas.destroy');
});

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

Route::get('/habitaciones', [HabitacionesController::class, 'listarHabitaciones'])->name('habitaciones.index');
Route::get('/habitaciones/search', [HabitacionesController::class, 'searchHabitaciones'])->name('habitaciones.search');
Route::get('/habitaciones/create', [HabitacionesController::class, 'createHabitacion'])->name('habitaciones.create');
Route::post('/habitaciones', [HabitacionesController::class, 'storeHabitacion'])->name('habitaciones.store');
Route::get('/habitaciones/{habitacion}', [HabitacionesController::class, 'showHabitacion'])->name('habitaciones.show');
Route::get('/habitaciones/{habitacion}/edit', [HabitacionesController::class, 'editHabitacion'])->name('habitaciones.edit');
Route::put('/habitaciones/{habitacion}', [HabitacionesController::class, 'updateHabitacion'])->name('habitaciones.update');
Route::patch('/habitaciones/{habitacion}', [HabitacionesController::class, 'updateHabitacion'])->name('habitaciones.update');
Route::delete('/habitaciones/{habitacion}', [HabitacionesController::class, 'destroyHabitacion'])->name('habitaciones.destroy');

Route::get('/servicios', [ServicioController::class, 'listarServicios'])->name('servicios.index');
Route::get('/servicios/search', [ServicioController::class, 'searchServicios'])->name('servicios.search');
Route::get('/servicios/create', [ServicioController::class, 'createServicio'])->name('servicios.create');
Route::post('/servicios', [ServicioController::class, 'storeServicio'])->name('servicios.store');
Route::get('/servicios/{servicio}', [ServicioController::class, 'showServicio'])->name('servicios.show');
Route::get('/servicios/{servicio}/edit', [ServicioController::class, 'editServicio'])->name('servicios.edit');
Route::put('/servicios/{servicio}', [ServicioController::class, 'updateServicio'])->name('servicios.update');
Route::patch('/servicios/{servicio}', [ServicioController::class, 'updateServicio'])->name('servicios.update');
Route::delete('/servicios/{servicio}', [ServicioController::class, 'destroyServicio'])->name('servicios.destroy');
