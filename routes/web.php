<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
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

Route::get('/hola', function () {
    return view('hola');
});
Route::get('/mostrar', function () {
    return view('mostrarCompras');
});

Route::group(["middleware"=>"auth"],function () {
    Route::get('/dashboard', function () {
        return view('principal');
    })->name('dashboard');
    Route::get("/usuarios/{id}/edit",[UserController::class,"editar"])->name("usuarios.edit");
    Route::put("/usuarios/{id}/edit",[UserController::class,"updat"])->name("usuarios.updatee");

    Route::group(['middleware' => 'admin'], function () {

        //----------------------------------------------perfil-----------------------------------------------------------------//
        Route::get("/usuarios",[UserController::class,"index"])->name("usuarios.index");
        Route::get("/usuarios/crear",[UserController::class,"create"])->name("usuarios.create");
        Route::get("/usuarios/{id}/editar",[UserController::class,"edit"])->name("usuarios.editar");
        Route::put("/usuarios/{id}/editar",[UserController::class,"update"])->name("usuarios.update");
        Route::post("/usuarios/store",[UserController::class,"store"])->name("usuarios.store");
        Route::get("/usuarios/{id}/eliminar",[UserController::class,"destroy"])->name("usuarios.destroy");// Eliminar el suario de la tabla

        //-------------------------------------detalle compras-------------------------------------------------------------------//
        Route::get("/detalleCompras",[DetalleCompraController::class,"index"])->name("DetalleCompras.index");//Muestra todos los productos en una tabla
        Route::get("/detalleCompras/total",[DetalleCompraController::class,"mostrarCompras"])->name("DetalleCompras.mostrarCompras");//Muestra todos los productos en una tabla
        Route::get("/detalleCompras/nuevo",[DetalleCompraController::class,"nuevo"])->name("DetalleCompras.nuevo");//Muestra el formulario de crear un nuevo producto.
        Route::post("/detalleCompras/store",[DetalleCompraController::class,"store"])->name("DetalleCompras.store");//Guarda el producto del formulario de productos
        Route::get("/detalleCompras/{id}/editar",[DetalleCompraController::class,"editar"])->name("DetalleCompra.editar");//Muestra el formulario de editar un producto
        Route::put("/detalleCompras/{id}/update",[DetalleCompraController::class,"update"])->name("DetalleCompra.update");//Guarda los datos del formulario editar
        Route::get("/detalleCompras/{id}/eliminar",[DetalleCompraController::class,"destroy"])->name("DetalleCompra.destroy");// Eliminar el producto de la tabla

        //--------------------Clientes-----------------------//
        Route::get("/clientes",[\App\Http\Controllers\ClienteController::class,"index"])->name("clientes.index");//Muestra todos los clientes en una tabla
        Route::get("/cliente/nuevo",[\App\Http\Controllers\ClienteController::class,"nuevo"])->name("cliente.nuevo");//Muestra el formulario de crear un nuevo cliente
        Route::post("/cliente/store",[\App\Http\Controllers\ClienteController::class,"store"])->name("cliente.store");//Guarda el cliente del formulario
        Route::get("/cliente/{id}/editars",[\App\Http\Controllers\ClienteController::class,"editar"])->name("cliente.editar");//Muestra un formulario de editar un cliente
        Route::put("/cliente/{id}/update",[\App\Http\Controllers\ClienteController::class,"update"])->name("cliente.update");//Actualiza los datos del formulario de editar cliente
        Route::get("/cliente/{id}/destroy",[\App\Http\Controllers\ClienteController::class,"destroy"])->name("cliente.destroy");//Elimina el cliente de la tabla

        //-----------Apertura de Caja ------------------//
        Route::get("/apertura_caja",\App\Http\Livewire\AperturaCajas::class)->name("apertura.index");//Trae todos las aperturas realizadas
        Route::post("/apertura/crear",[AperturaCajaController::class,"store"])->name("apertura.crear");//Crea una nueva apertura de caja

        //---------------Categorias-----------------//
        Route::get("/categorias",[CategoriaController::class,"index"])->name("categorias.index"); // Trae todos las categorias
        Route::get("/categorias/busqueda",[CategoriaController::class,"buscarCategoria"])->name("categoria.buscar");//Busca entre las categorias en nombre
        Route::get("/categoria/nueva",[CategoriaController::class,"nuevo"])->name("categoria.nueva");//Muestra el formulario para crear una nueva categoria
        Route::post("/categorias/store",[CategoriaController::class,"store"])->name("categoria.store");//Crea una nueva categoria del formulario
        Route::get("/categoria/{id}/editar",[CategoriaController::class,"editar"])->name("categoria.editar");//Llama el formulario editar una categoria
        Route::put("/categoria/{id}/update",[CategoriaController::class,"update"])->name("categoria.update");//Actualiza la categoria en el formulario editar
        Route::get('/categoria/{id}/destroy',[CategoriaController::class,"destroy"])->name("categoria.destroy");//Borrar la categoria desde la tabla

        //-------------------Productos--------------------//
        Route::get("/productos",[ProductoController::class,"index"])->name("productos.index");//Muestra todos los productos en una tabla
        Route::get("/producto/busqueda",[ProductoController::class,"buscarProducto"])->name("producto.buscar");//Buscar Producto
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

        //-----------Servicios------------------//
        Route::get("/servicios",[\App\Http\Controllers\ServicioController::class,"index"])->name("servicios.index");//muestra todos los servicios
        Route::get("/servicios/crear",[\App\Http\Controllers\ServicioController::class,"create"])->name("servicios.crear");//formulario de crear servicio
        Route::post('/servicios/crear', [\App\Http\Controllers\ServicioController::class,"store"])->name('servicios.store');//crea el nuevo servicio
        Route::get("/servicios/{id}/editar",[\App\Http\Controllers\ServicioController::class,"edit"])->name("servicios.editar");//Llama el formulario editar un servicio
        Route::put("/servicios/{id}/update",[\App\Http\Controllers\ServicioController::class,"update"])->name("servicios.update");//Actualiza el servicio en el formulario editar
        Route::get('/servicios/{id}/destroy',[\App\Http\Controllers\ServicioController::class,"destroy"])->name("servicios.destroy");//Borrar el servicio desde la tabla

        //-----------Ventas------------------//
        Route::get("/ventas",\App\Http\Livewire\Ventas::class)->name("ventas.index");//Trae todos las aperturas realizadas
        Route::get("/venta/crear",\App\Http\Livewire\CrearVenta::class)->name("venta.nuevo");


    });

    //------------------Inventario--------------//
    Route::get("/inventarios",[\App\Http\Controllers\InventarioController::class,"index"])->name("inventario.index");
    Route::get("/inventario/nuevo",[\App\Http\Controllers\InventarioController::class,"nuevo"])->name("inventario.nuevo");
    Route::post("/inventario/store",[\App\Http\Controllers\InventarioController::class,"store"])->name("inventario.store");//Permite registrar un nuevo producto al inventario
    Route::get("/inventario/{id}/producto/editar",[\App\Http\Controllers\InventarioController::class,"editar"])->name("inventario.editar");
    Route::put("/inventario/{id}/update",[\App\Http\Controllers\InventarioController::class,"update"])->name("inventario.update");
    Route::get("/inventario/{id}/producto/eliminar",[\App\Http\Controllers\InventarioController::class,"destroy"])->name("inventario.destroy");

    //________________comprass__________________________//
    Route::get("/compras",[\App\Http\Controllers\CompraController::class,"index"])->name("compras.index");//muestra todas las compras
    Route::get("/compras/crear",[\App\Http\Controllers\CompraController::class,"crear"])->name("compras.crear");//lleva al formulario de creado
    Route::post("/compras/crear",[\App\Http\Controllers\CompraController::class,"store"])->name("compras.store");//crea la nueva compra
    Route::get("/compras/{id}/editar",[\App\Http\Controllers\CompraController::class,"edit"])->name("compras.editar");//Llama el formulario editar una categoria
    Route::put("/compras/{id}/update",[\App\Http\Controllers\CompraController::class,"update"])->name("compras.update");//Actualiza la categoria en el formulario editar
    Route::get('/compras/{id}/destroy',[\App\Http\Controllers\CompraController::class,"destroy"])->name("compras.destroy");//Borrar la categoria desde la tabla


});

//________________Graficas__________________________//
//Route::get("/graficas.graficarClientes",[\App\Http\Controllers\GraficasController::class,"graficarClientes"])->name("clientes.graficar");
Route::get('/grafica', function () {
    return view('graficas.graficarClientes');
});

