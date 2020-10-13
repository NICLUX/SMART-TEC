<?php

use App\Http\Controllers\AperturaCajaController;
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
    return view('principal');
});


Route::get('/cc', function () {
    return view('hola');
});

Route::get('/dashboard', 'UsuarioController@create')
    ->name('/dashboard');


//-----------Apertura de Caja ------------------//
Route::get("/apertura_caja",[AperturaCajaController::class,"index"])->name("apertura.index");//Trae todos las aperturas realizadas
Route::post("/apertura/crear",[AperturaCajaController::class,"store"])->name("apertura.crear");//Crea una nueva apertura de caja
