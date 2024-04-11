<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cocina', function () {
    return view('cocina');
});

Route::get('/spa', function () {
    return view('spa');
});

Route::get('/habitaciones', function () {
    return view('habitaciones');
});
