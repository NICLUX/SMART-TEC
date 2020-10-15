<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});


Route::get('/cc', function () {
    return view('hola');
});

//-----------pantalla de Usuario a traves de Boton ------------------//
//Route::get('/register', [UsuarioController::class, "create"])->name('register');//Se desplaza a la pantalla principal de Usuario


//-----------Apertura de Caja ------------------//
Route::get("/apertura_caja",[AperturaCajaController::class,"index"])->name("apertura.index");//Trae todos las aperturas realizadas
Route::post("/apertura/crear",[AperturaCajaController::class,"store"])->name("apertura.crear");//Crea una nueva apertura de caja


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('principal');
})->name('dashboard');
