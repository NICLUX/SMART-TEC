<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::paginate(10);
        return view("Servicios.vista_tabla_servicios")->with("servicios", $servicios);
    }
    public function mostrar()
    {
        $servicios = Servicio::paginate(10);
        return view("Servicios.servicio")->with("servicios", $servicios);
    }

    public function create()
    {
        $servicios=Servicio::all();
        $categorias = Categoria::all();
        return view("Servicios.agregar_servicio")
            ->with("categorias", $categorias)
            ->with("servicios", $servicios);
    }
    public function stor(Request $request)
    {
        $this->validate($request, [
            "nombre" => "required|max:80",
            "costo_venta" => "required|numeric",
            "descripcion" => "max:150",
            "id_categoria"=>'required'

        ], [
            "nombre.required" => "Se requiere ingresar el nombre",
            "nombre.max" => "El nombre debe ser menor o igual que 80 caracteres",
            "costo_venta.required" => "Se requiere el costo de venta.",
            "costo_venta.numeric" => "Se requiere que el costo de venta sea un numero",
            "descripcion.max" => "La descripcion debe ser menor o igual que 150 caracteres",
            "id_categoria"=>"Se requiere ingresar la categoria."
        ]);

        $servicio = new Servicio();
        $servicio ->nombre = $request->input("nombre");
        $servicio ->id_categoria = $request->input("id_categoria");
        $servicio ->costo_venta = $request->input("costo_venta");
        $servicio ->descripcion = $request->input("descripcion");
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
            $servicio ->imagen_url = $imagen;
        }
        $servicio ->save();
        return redirect()->route("servicios.index.nuevo")
            ->with("exito", "Se creo exitosamente el producto.");
    }
}
