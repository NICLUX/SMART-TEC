<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view("productos.productos_index")->with("productos", $productos);
    }
    public function nuevaVista (){
        $productos = Producto::paginate(10);
        return view("servicios.vista_tabla_servicios")->with("productos", $productos);
    }

    public function mostrar()
    {
        $productos = Producto::paginate(10);
        return view("productos.TablaProductos")->with("productos", $productos);
    }

    public function buscarProducto(Request $request){
        $busqueda = $request->input("busqueda");
        $productos = Producto::where("nombre",
            "like","%".$request->input("busqueda")."%")
            ->paginate(10);

        return view("productos.productos_index")
            ->with("busqueda",$busqueda)->with("productos", $productos);
    }
    public function nuevo()
    {
        $categorias = Categoria::all();
        return view("productos.nuevo_producto")->with("categorias", $categorias);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|max:2048',
            "nombre" => "required|max:80",
            "costo_compra" => "required|numeric",
            "costo_venta" => "required|numeric",
            "descripcion" => "max:80"

        ], [
            "nombre.required" => "Se requiere ingresar el nombre",
            "nombre.max" => "El nombre debe ser menor o igual que 80 caracteres",
            "costo_compra.required" => "Se requiere que ingrese el costo de compra",
            "costo_compra.numeric" => "El costo de compra debe ser un numero",
            "costo_venta.required" => "Se requiere el costo de venta.",
            "costo_venta.numeric" => "Se requiere que el costo de venta sea un numero",
            "descripcion.max" => "La descripcion debe ser menor o igual que 80 caracteres"
        ]);

        $producto = new Producto();
        $producto->nombre = $request->input("nombre");
        $producto->costo_compra = $request->input("costo_compra");
        $producto->id_categoria = $request->input("id_categoria");
        $producto->costo_venta = $request->input("costo_venta");
        $producto->descripcion = $request->input("descripcion");

        $path = public_path() . '\images\productos';//Carpeta publica de las imagenes de los productos

        if ($request->imagen_url) {
            $imagen = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/productos/" . $imagen;
            copy($ruta, $destino);
            $producto->imagen_url = $imagen;
        }

        $producto->save();

        return redirect()->route("productos.index")
            ->with("exito", "Se creo exitosamente el producto.");

    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view("productos.editar_producto")
            ->withCategorias($categorias)
            ->with("producto", $producto);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "nombre" => "required|max:80",
            "costo_compra" => "required|numeric",
            "costo_venta" => "required|numeric",
            "descripcion" => "max:80"

        ], [
            "nombre.required" => "Se requiere ingresar el nombre",
            "nombre.max" => "El nombre debe ser menor o igual que 80 caracteres",
            "costo_compra.required" => "Se requiere que ingrese el costo de compra",
            "costo_compra.numeric" => "El costo de compra debe ser un numero",
            "costo_venta.required" => "Se requiere el costo de venta.",
            "costo_venta.numeric" => "Se requiere que el costo de venta sea un numero",
            "descripcion.max" => "La descripcion debe ser menor o igual que 80 caracteres"
        ]);


        $actualizarProducto = Producto::findOrFail($id);
        $actualizarProducto->nombre = $request->input("nombre");
        $actualizarProducto->costo_compra = $request->input("costo_compra");
        $actualizarProducto->costo_venta = $request->input("costo_venta");
        $actualizarProducto->descripcion = $request->input("descripcion");


        $path = public_path() . '\images\productos';//Carpeta publica de las imagenes de los productos

        if ($request->imagen_url) {
            /***Si la imagen es enviada por el usuario se debe eliminar la anterior **/
            $img_anterior = public_path() . "/images/categorias/" . $actualizarProducto->imagen_url;
            if (File::exists($img_anterior)) {
                File::delete($img_anterior);
            }

            $imagen = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/productos/" . $imagen;
            copy($ruta, $destino);
            $actualizarProducto->imagen_url = $imagen;
        }

        $actualizarProducto->save();

        return redirect()->route("productos.index")
            ->with("exito", "Se actualizo exitosamente el producto.");

    }

    public function destroy($id)
    {
        $producto= Producto::findOrFail($id);
        $inventario = Inventario::where("id_producto","=",$id);
        $inventario->delete();
        /***Si la imagen exite se debe eliminar  **/
        $img_anterior=public_path()."/images/productos/".$producto->imagen_url;
        if (File::exists($img_anterior)){
            File::delete($img_anterior);
        }
        $producto->delete();




        return redirect()->route("productos.index")
            ->with("exito", "Se elimino exitosamente el producto.");
    }

}
