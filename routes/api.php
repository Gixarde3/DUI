<?php

use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugerenciaController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\ComidaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['controller' => UsuarioController::class], function () {
    Route::post('login', 'iniciar_sesion');
    Route::post('usuario', 'crear_usuario');
    Route::post('usuario/editar/{id}', 'editar_usuario');
    Route::delete('usuario/eliminar/{id}', 'eliminar_usuario');
    Route::get('usuarios', 'obtener_usuarios');
    Route::get('usuario/{id}', 'obtener_usuario');
    Route::post('usuario/cambiar-rol/{id}', 'cambiar_rol');
});

Route::group(['controller' => HabitacionController::class], function () {
    Route::post('habitacion', 'crear_habitacion');
    Route::post('habitacion/editar/{id}', 'editar_habitacion');
    Route::delete('habitacion/eliminar/{id}', 'eliminar_habitacion');
    Route::get('habitaciones', 'obtener_habitaciones');
    Route::get('habitacion/{id}', 'obtener_habitacion');
});

//Rutas de sugerencias
Route::group(['controller' => SugerenciaController::class], function () {
    Route::post('sugerencia', 'crear_sugerencia');
    Route::post('sugerencia/editar/{id}', 'editar_sugerencia');
    Route::delete('sugerencia/eliminar/{id}', 'eliminar_sugerencia');
    Route::get('sugerencias', 'obtener_sugerencias');
    Route::get('sugerencia/{id}', 'obtener_sugerencia');
});

//Rutas de reservaciones
Route::group(['controller' => ReservacionController::class], function () {
    Route::post('reservacion', 'crear_reservacion');
    Route::post('reservacion/editar/{id}', 'editar_reservacion');
    Route::delete('reservacion/eliminar/{id}', 'eliminar_reservacion');
    Route::get('reservaciones', 'obtener_reservaciones');
    Route::get('reservaciones/{id}', 'obtener_reservaciones_habitacion');
    Route::get('reservacion/{id}', 'obtener_reservacion');
});

//Rutas de comidas
Route::group(['controller' => ComidaController::class], function () {
    Route::post('platillo', 'crear_platillo');
    Route::post('platillo/editar/{id}', 'editar_platillo');
    Route::delete('platillo/eliminar/{id}', 'eliminar_platillo');
    Route::get('platillos', 'obtener_platillos');
    Route::get('platillo/{id}', 'obtener_platillo');
});