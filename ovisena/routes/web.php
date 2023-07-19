<?php

use App\Http\Controllers\QuienessomosController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('/rebano', App\Http\Controllers\RebanoController::class);

Route::get('/agregarRebano', [App\Http\Controllers\RebanoController::class, 'agregar']);

Route::get('/buscarRebano/{cadena}', [App\Http\Controllers\RebanoController::class, 'buscarRebano']);

Route::resource('/responsable', App\Http\Controllers\ResponsableController::class);

Route::get('/agregarResponsable', [App\Http\Controllers\ResponsableController::class, 'agregar']);

Route::get('/buscarResponsable/{cadena}', [App\Http\Controllers\ResponsableController::class, 'buscarResponsable']);

Route::resource('/ovino', App\Http\Controllers\OvinoController::class);

Route::get('/agregarOvino', [App\Http\Controllers\OvinoController::class, 'agregar']);

Route::get('/buscarOvino/{cadena}', [App\Http\Controllers\OvinoController::class, 'buscarOvino']);

Route::resource('/sanidad', App\Http\Controllers\SanidadController::class);

Route::get('/agregarSanidad', [App\Http\Controllers\SanidadController::class, 'agregar']);

Route::get('/buscarSanidad/{cadena}', [App\Http\Controllers\SanidadController::class, 'buscarSanidad']);

Route::resource('/pesaje', App\Http\Controllers\PesajeController::class);

Route::get('/agregarPesaje', [App\Http\Controllers\PesajeController::class, 'agregar']);

Route::get('/buscarPesaje/{cadena}', [App\Http\Controllers\PesajeController::class, 'buscarPesaje']);

Route::resource('/salida', App\Http\Controllers\SalidaController::class);

Route::get('/agregarSalida', [App\Http\Controllers\SalidaController::class, 'agregar']);

Route::get('/buscarSalida/{cadena}', [App\Http\Controllers\SalidaController::class, 'buscarSalida']);

Route::resource('/alimentacion', App\Http\Controllers\AlimentacionController::class);

Route::get('/agregarAlimentacion', [App\Http\Controllers\AlimentacionController::class, 'agregar']);

Route::get('/buscarAlimentacion/{cadena}', [App\Http\Controllers\AlimentacionController::class, 'buscarAlimentacion']);

Route::resource('/parto', App\Http\Controllers\PartoController::class);

Route::get('/agregarParto', [App\Http\Controllers\PartoController::class, 'agregar']);

Route::get('/buscarParto/{cadena}', [App\Http\Controllers\PartoController::class, 'buscarParto']);

Route::get('/consultarOvinos', [App\Http\Controllers\OvinoController::class, 'ovinosparaAgregar']);

/* **Botones para informacion de la unidad** */
Route::get('/inicio', [App\Http\Controllers\InicioController::class, 'vista']);
Route::get('/quienessomos', [App\Http\Controllers\QuienessomosController::class, 'vista']);
Route::get('/acercade', [App\Http\Controllers\AcercadeController::class, 'vista']);