<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PartituraController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PresupuestoController;


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
$collection=[];
Route::get('/', function () {
    return view('welcome');
});

Route::get('registro', [RegisterController::class,'show']);

Route::post('registro', [RegisterController::class,'register'])->name('registro');

Route::get('login', [LoginController::class,'show']);

Route::post('login', [LoginController::class,'login'])->name('login');

Route::get('home', [HomeController::class,'index']) -> name('home');

Route::get('logout', [LogoutController::class,'logout']);

Route::get('calendario', [CalendarioController::class,'show']);

Route::get('obtener-eventos', [CalendarioController::class, 'obtenerEventos'])->name('obtener_eventos'); 

Route::post('insertar_evento', [EventoController::class,'insertar'])->name('insertar_evento');

Route::post('eliminar-evento', [EventoController::class,'eliminar'])->name('eliminar_evento');

Route::get('base', [BaseController::class,'show']);

Route::get('archivo', [ArchivoController::class,'show']);

Route::post('insertar_partitura', [PartituraController::class,'insertar'])->name('insertar_partitura');

Route::post('modificar_partitura', [PartituraController::class,'modificar'])->name('modificar_partitura');

Route::post('eliminar_partitura', [PartituraController::class, 'eliminar'])->name('eliminar_partitura');

Route::get('buscar_partituras', [PartituraController::class, 'buscar'])->name('buscar_partituras');//////////////////////////////////


Route::get('usuario', [UsuarioController::class,'show']);

Route::post('modificar_usuario', [UsuarioController::class,'modificar'])->name('modificar_usuario');

Route::post('eliminar_usuario', [UsuarioController::class, 'eliminar'])->name('eliminar_usuario');

Route::get('asistencia', [AsistenciaController::class,'show']);

Route::get('contacto', [ContactoController::class,'show']);

Route::get('evaluacion', [EvaluacionController::class,'show']);

Route::get('presupuesto', [PresupuestoController::class,'show']);
?>