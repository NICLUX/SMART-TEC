<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\CategoriaController;
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

//---------------Categorias-----------------//
Route::get("/categorias",[CategoriaController::class,"index"])->name("categorias.index"); // Trae todos las categorias
Route::get("/categoria/nueva",[CategoriaController::class,"nuevo"])->name("categoria.nueva");

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('principal');
})->name('dashboard');
 //________________comprass__________________________//
Route::get("/compras",[\App\Http\Controllers\CompraController::class,"index"])->name("compras.index");
Route::get("/compras/crear",[\App\Http\Controllers\CompraController::class,"index"])->name("compras.crear");

//-----------Ventas------------------//
Route::get("/ventas",[\App\Http\Controllers\VentaController::class,"index"])->name("ventas.index");//Trae todos las aperturas realizadas

//-----------Servicios------------------//
Route::get("/servicios",[\App\Http\Controllers\ServicioController::class,"index"])->name("servicios.index");
Route::get("/servicios/crear",[\App\Http\Controllers\ServicioController::class,"store"])->name("servicios.crear");

//agregar clientes...

Route::get('/yu', function () {
    return view('cliente');
});




