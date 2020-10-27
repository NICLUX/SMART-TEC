<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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
Route::get("/categoria/nueva",[CategoriaController::class,"nuevo"])->name("categoria.nueva");//Muestra el formulario para crear una nueva categoria
Route::post("/categorias/store",[CategoriaController::class,"store"])->name("categoria.store");//Crea una nueva categoria del formulario
Route::get("/categoria/{id}/editar",[CategoriaController::class,"editar"])->name("categoria.editar");//Llama el formulario editar una categoria
Route::put("/categoria/{id}/update",[CategoriaController::class,"update"])->name("categoria.update");//Actualiza la categoria en el formulario editar
Route::get('/categoria/{id}/destroy',[CategoriaController::class,"destroy"])->name("categoria.destroy");//Borrar la categoria desde la tabla


//-------------------Productos--------------------//
Route::get("/productos",[ProductoController::class,"index"])->name("productos.index");//Muestra todos los productos en una tabla
Route::get("/producto/nuevo",[ProductoController::class,"nuevo"])->name("producto.nuevo");//Muestra el formulario de crear un nuevo producto.
Route::post("/producto/store",[ProductoController::class,"store"])->name("producto.store");//Guarda el producto del formulario de productos
Route::get("/producto/{id}/editar",[ProductoController::class,"editar"])->name("producto.editar");//Muestra el formulario de editar un producto
Route::put("/producto/{id}/update",[ProductoController::class,"update"])->name("producto.update");//Guarda los datos del formulario editar
Route::get("/producto/{id}/eliminar",[ProductoController::class,"destroy"])->name("producto.destroy");// Eliminar el producto de la tabla

//------------------Proveedores-----------------------//
Route::get("/proveedores",[\App\Http\Controllers\ProveedorController::class,"index"])->name("proveedores.index");//Muestra todos los proveedores registrados
Route::get("/proveedor/crear",[\App\Http\Controllers\ProveedorController::class,"nuevo"])->name("proveedor.nuevo");//Muestra el formulario para crear un nuevo proveedor
Route::post("/proveedor/store",[\App\Http\Controllers\ProveedorController::class,"store"])->name("proveedor.store");//Guardar el proveedor del formulario agregar
Route::get("/proveedor/{id}/editar",[\App\Http\Controllers\ProveedorController::class,"editar"])->name("proveedor.editar");//Muestra el formulario de editar proveedor
Route::put("/proveedor/{id}/update",[\App\Http\Controllers\ProveedorController::class,"update"])->name("proveedor.update");//Guarda los datos de actualizar proveedor
Route::get("/proveedor/{id}/destroy",[\App\Http\Controllers\ProveedorController::class,"destroy"])->name("proveedor.destroy");//Borra un proveedor desde la lista

//--------------------Clientes-----------------------//
Route::get("/clientes",[\App\Http\Controllers\ClienteController::class,"index"])->name("clientes.index");//Muestra todos los clientes en una tabla
Route::get("/cliente/nuevo",[\App\Http\Controllers\ClienteController::class,"nuevo"])->name("cliente.nuevo");//Muestra el formulario de crear un nuevo cliente
Route::post("/cliente/store",[\App\Http\Controllers\ClienteController::class,"store"])->name("cliente.store");//Guarda el cliente del formulario
Route::get("/cliente/{id}/editar",[\App\Http\Controllers\ClienteController::class,"editar"])->name("cliente.editar");//Muestra un formulario de editar un cliente
Route::put("/cliente/{id}/update",[\App\Http\Controllers\ClienteController::class,"update"])->name("cliente.update");//Actualiza los datos del formulario de editar cliente
Route::get("/cliente/{id}/destroy",[\App\Http\Controllers\ClienteController::class,"destroy"])->name("cliente.destroy");//Elimina el cliente de la tabla

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('principal');
})->name('dashboard');
 //________________comprass__________________________//
Route::get("/compras",[\App\Http\Controllers\CompraController::class,"index"])->name("compras.index");//muestra todas las compras
Route::get("/compras/crear",[\App\Http\Controllers\CompraController::class,"crear"])->name("compras.crear");//lleva al formulario de creado
Route::post("/compras/crear",[\App\Http\Controllers\CompraController::class,"store"])->name("compras.store");//crea la nueva compra
//-----------Ventas------------------//
Route::get("/ventas",[\App\Http\Controllers\VentaController::class,"index"])->name("ventas.index");//Trae todos las aperturas realizadas

//-----------Servicios------------------//
Route::get("/servicios",[\App\Http\Controllers\ServicioController::class,"index"])->name("servicios.index");//muestra todos los servicios
Route::get("/servicios/crear",[\App\Http\Controllers\ServicioController::class,"create"])->name("servicios.crear");//formulario de crear servicio
Route::post('/servicios/crear', [\App\Http\Controllers\ServicioController::class,"store"])->name('servicios.store');//crea el nuevo servicio
Route::get("/servicios/{id}/editar",[\App\Http\Controllers\ServicioController::class,"edit"])->name("servicios.editar");//Llama el formulario editar un servicio
Route::put("/servicios/{id}/update",[\App\Http\Controllers\ServicioController::class,"update"])->name("servicios.update");//Actualiza el servicio en el formulario editar
Route::get('/servicios/{id}/destroy',[\App\Http\Controllers\ServicioController::class,"destroy"])->name("servicios.destroy");//Borrar el servicio desde la tabla


//agregar clientes...

Route::get('/yu', function () {
    return view('cliente');
});




