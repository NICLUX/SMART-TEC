<?php

use App\Http\Controllers\AperturaCajaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServiciooController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AperturaCajas;
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
    //--------------------perfil----------------------------------//
    Route::get("/usuarios/{id}/edit",[UserController::class,"editar"])->name("usuarios.edit");
    Route::put("/usuarios/{id}/edit",[UserController::class,"updat"])->name("usuarios.updatee");
    Route::get("/usuarios/{id}/editfoto",[UserController::class,"editarFoto"])->name("foto.edit");
    Route::put("/usuarios/{id}/editfoto",[UserController::class,"updateFoto"])->name("foto.actualizar");
    //-------------------punto de venta_----------------------------//
    Route::get("/venta/crear",\App\Http\Livewire\CrearVenta::class)->name("venta.nuevo");
    Route::get("/venta/{id}/detalle",\App\Http\Livewire\DetalleVenta::class)->name("venta.detalle");
    //Factura imprimir y ventas diarias
    Route::get("/ventas/{id}/factura",\App\Http\Controllers\VentaController::class,"imprimir_factura")->name("venta.imprimir_factura");
    Route::get("/ventas/diarias",\App\Http\Livewire\VentasDiarias::class)->name("ventas_diarias.index");//Muestra la ventas diarias
    //-----------Ventas------------------//
    Route::get("/ventas",\App\Http\Livewire\Ventas::class)->name("ventas.index");//Trae todos las aperturas realizadas


    Route::group(['middleware' => 'admin'], function () {
        //----------------------------------------------perfil-----------------------------------------------------------------//
        Route::get("/usuarios",[UserController::class,"index"])->name("usuarios.index");
        Route::get("/usuariost",[UserController::class,"mostrar"])->name("usuarios.mostrar");
        Route::get("/usuarios/crear",[UserController::class,"create"])->name("usuarios.create");
        Route::get("/usuarios/{id}/editar",[UserController::class,"edit"])->name("usuarios.editar");
        Route::put("/usuarios/{id}/editar",[UserController::class,"update"])->name("usuarios.update");
        Route::post("/usuarios/store",[UserController::class,"store"])->name("usuarios.store");
        Route::get("/usuarios/{id}/eliminar",[UserController::class,"destroy"])->name("usuarios.destroy");// Eliminar el suario de la tabla
        Route::get("/usuarios/{id}/borrar",[UserController::class,"borrar"])->name("usuarios.borrar");

        //________________comprass__________________________//
        Route::get("/compras",[\App\Http\Controllers\CompraController::class,"index"])->name("compras.index");//muestra todas las compras
        Route::get("/compras/{id}/detalle",[\App\Http\Controllers\CompraController::class,"show"])->name("compras.show");//lleva al formulario de creado
        Route::get("/compras/crear",[\App\Http\Controllers\CompraController::class,"crear"])->name("compras.nuevo");//lleva al formulario de creado
        Route::post("/compras/crear",[\App\Http\Controllers\CompraController::class,"store"])->name("compras.store");//crea la nueva compra
        Route::get('/compras/{id}/destroy',[\App\Http\Controllers\CompraController::class,"destroy"])->name("compras.destroy");//Borrar la categoria desde la tabla

        //--------------------Clientes-----------------------//
        Route::get("/clientes",[\App\Http\Controllers\ClienteController::class,"index"])->name("clientes.index");//Muestra todos los clientes en una tabla
        Route::get("/cliente/nuevo",[\App\Http\Controllers\ClienteController::class,"nuevo"])->name("cliente.nuevo");//Muestra el formulario de crear un nuevo cliente
        Route::post("/cliente/store",[\App\Http\Controllers\ClienteController::class,"store"])->name("cliente.store");//Guarda el cliente del formulario
        Route::get("/cliente/{id}/editars",[\App\Http\Controllers\ClienteController::class,"editar"])->name("cliente.editar");//Muestra un formulario de editar un cliente
        Route::put("/cliente/{id}/update",[\App\Http\Controllers\ClienteController::class,"update"])->name("cliente.update");//Actualiza los datos del formulario de editar cliente
        Route::delete("/cliente/{id}/destroy",[\App\Http\Controllers\ClienteController::class,"destroy"])->name("cliente.destroy");//Elimina el cliente de la tabla

        //-----------Apertura de Caja ------------------//
        Route::get("/apertura_caja",AperturaCajas::class)->name("apertura.index");//Trae todos las aperturas realizadas
        Route::post("/apertura/crear",[AperturaCajaController::class,"store"])->name("apertura.crear");//Crea una nueva apertura de caja

        //---------------Categorias-----------------//
        Route::get("/categorias",[CategoriaController::class,"index"])->name("categorias.index"); // Trae todos las categorias
        Route::get("/categorias/busqueda",[CategoriaController::class,"buscarCategoria"])->name("categoria.buscar");//Busca entre las categorias en nombre
        Route::get("/categoria/nueva",[CategoriaController::class,"nuevo"])->name("categoria.nueva");//Muestra el formulario para crear una nueva categoria
        Route::post("/categorias/store",[CategoriaController::class,"store"])->name("categoria.store");//Crea una nueva categoria del formulario
        Route::post("/categorias/stor",[CategoriaController::class,"stor"])->name("categoria.stor");//Crea una nueva categoria del formulario
        Route::get("/categoria/{id}/editar",[CategoriaController::class,"editar"])->name("categoria.editar");//Llama el formulario editar una categoria
        Route::put("/categoria/{id}/update",[CategoriaController::class,"update"])->name("categoria.update");//Actualiza la categoria en el formulario editar
        Route::get('/categoria/{id}/destroy',[CategoriaController::class,"destroy"])->name("categoria.destroy");//Borrar la categoria desde la tabla

        //-------------------Productos--------------------//
        Route::get("/productos",[ProductoController::class,"index"])->name("productos.index");//Muestra todos los productos en una tabla
        Route::get("/productost",[ProductoController::class,"mostrar"])->name("productos.mostrar");
        Route::get("/producto/busqueda",[ProductoController::class,"buscarProducto"])->name("producto.buscar");//Buscar Producto
        Route::get("/producto/nuevo",[ProductoController::class,"nuevo"])->name("producto.nuevo");//Muestra el formulario de crear un nuevo producto.
        Route::post("/producto/store",[ProductoController::class,"store"])->name("producto.store");
        Route::post("/producto/stor",[ProductoController::class,"stor"])->name("producto.stor");//Guarda el producto del formulario de productos
        Route::get("/producto/{id}/editar",[ProductoController::class,"editar"])->name("producto.editar");//Muestra el formulario de editar un producto
        Route::put("/producto/{id}/editar",[ProductoController::class,"update"])->name("producto.update");//Guarda los datos del formulario editar
        Route::delete("/producto/{id}/eliminar",[ProductoController::class,"destroy"])->name("producto.destroy");// Eliminar el producto de la tabla
        Route::get("/producto/vistaTabla",[ServiciooController::class,"nuevaVista"])->name("producto.nuevaVista");//Buscar Producto
        Route::get("/producto/reporte",[\App\Http\Controllers\ProductoController::class,"imprimir_productos"])->name("productos.imprimir");


        //------------------Proveedores-----------------------//
        Route::get("/proveedores",[\App\Http\Controllers\ProveedorController::class,"index"])->name("proveedores.index");//Muestra todos los proveedores registrados
        Route::get("/proveedor/crear",[\App\Http\Controllers\ProveedorController::class,"nuevo"])->name("proveedor.nuevo");//Muestra el formulario para crear un nuevo proveedor
        Route::post("/proveedor/store",[\App\Http\Controllers\ProveedorController::class,"store"])->name("proveedor.store");//Guardar el proveedor del formulario agregar
        Route::post("/proveedor/stor",[\App\Http\Controllers\ProveedorController::class,"stor"])->name("proveedor.stor");//Guardar el proveedor del formulario agregar
        Route::get("/proveedor/{id}/editar",[\App\Http\Controllers\ProveedorController::class,"editar"])->name("proveedor.editar");//Muestra el formulario de editar proveedor
        Route::put("/proveedor/{id}/update",[\App\Http\Controllers\ProveedorController::class,"update"])->name("proveedor.update");//Guarda los datos de actualizar proveedor
        Route::get("/proveedor/{id}/destroy",[\App\Http\Controllers\ProveedorController::class,"destroy"])->name("proveedor.destroy");//Borra un proveedor desde la lista

        //-----------Servicios------------------//
        Route::get("/servicios",[ServiciosController::class,"index"])->name("servicios.index");//muestra todos los servicios
        Route::get("/servicios/crear",[ServiciooController::class,"create"])->name("servicios.crear");//formulario de crear servicio
        Route::post('/servicios/crear', [ServiciooController::class,"store"])->name('servicios.store');//crea el nuevo servicio
        Route::get("/servicios/{id}/editar",[ServiciooController::class,"edit"])->name("servicios.editar");//Llama el formulario editar un servicio
        Route::put("/servicios/{id}/update",[ServiciooController::class,"update"])->name("servicios.update");//Actualiza el servicio en el formulario editar
        Route::get('/servicios/{id}/destroy',[ServiciooController::class,"destroy"])->name("servicios.destroy");//Borrar el servicio desde la tabla
        Route::get("/servicio/busqueda",[ServiciooController::class,"buscarServicio"])->name("servicios.buscar");//Buscar Producto
        Route::get("/servicio/vistaTabla",[ServiciooController::class,"nuevaVista"])->name("servicios.nuevaVista");//Buscar Producto
        //----------Ventas diarias-----------//
        Route::get("/total",[\App\Http\Controllers\VentasTotalUserController::class,"total"])->name("vesta_total");//muestra todos los servicios
        Route::get("/total/detalle",[\App\Http\Controllers\VentasTotalUserController::class,"show"])->name("vesta.show");//muestra todos los servicios
        Route::get("/total/busqueda",[\App\Http\Controllers\VentasTotalUserController::class,"buscar"])->name("ventas.buscar");//Busca entre las categorias en nombre
          //----------Ventas Mensuales-----------//
        Route::get("/ventas/mensuales",\App\Http\Livewire\VentasMensuales::class)->name("ventas_mensuales.index");//Muestra la ventas mensuales
        //----------Ventas Mensuales-----------//
        Route::get("/ventas/anuales",\App\Http\Livewire\VentasAnuales::class)->name("ventas_anuales.index");//Muestra la ventas mensuales
    });

    //________________Cuentas__________________________//
    Route::get("/cuentas",[\App\Http\Controllers\CobroController::class,"index"])->name("cuenta.index");//muestras las cuentas
    Route::get("/cuentas/crear",[\App\Http\Controllers\CobroController::class,"create"])->name("cuenta.nueva");//formulario cuentas
    Route::post('/cuentas/crear', [\App\Http\Controllers\CobroController::class,"store"])->name('cuenta.store');//crea una nueva cuenta

    //----------------ACERCA DE----------------------------//
    Route::get("/acerca_de",function (){
        return view("acerca_de.acerca_de");
    })->name("acerca_de");

});

    //________________Vista Prueba Tablas__________________________//
    Route::get('/prueba', function () {
        return view('pruebas.vista_prueba');
    });



//________________Graficas__________________________//
Route::get("graficas.graficarClientes",[\App\Http\Controllers\GraficasController::class,"graficarClientes"])->name("clientes.graficar");
Route::get('/grafica', function () {
  return view('graficas.graficarClientes');
});

