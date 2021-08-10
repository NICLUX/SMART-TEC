<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{

    //Metodo para mostrar todas las categorias
    public function index (){
        $categorias = Categoria::paginate(5);
        return view("categorias.categorias")->with("categorias",$categorias);
    }

    public function crear(){
        $categorias = Categoria::paginate(5);
        return view("categorias.nueva_categoria")->with("categorias",$categorias);
    }

    public function buscarCategoria(Request $request){
        $busqueda = $request->input("busqueda");
        $categorias = Categoria::where("nombre","like","%".$request->input("busqueda")."%")->paginate(5);
        return view("categorias.categorias")
            ->with("busqueda",$busqueda)->with("categorias",$categorias);
    }

    public function nuevaCtegoria(Request $request){
        $this->validate($request,[
            "nombre"=>"required|max:80|unique:categorias,nombre",
            "imagen_url"=>"image",
        ],[
            "nombre.required"=>"Se debe ingresar el nombre de la categoría.",
            "nombre.unique"=>"El nombre de la categoría debe ser unico.",
            "nombre.max"=>"El nombre de la categoría debe ser menor a 80 caracteres",
            "imagen_url.image"=>"Tiene que elegir una imagen real."
        ]);

        $nuevaCategoria = new Categoria();
        $nuevaCategoria->nombre = $request->input("nombre");
        $path = public_path() . '\images\categorias';//Carpeta publica de las imagenes
        if($request->imagen_url){

            $imagen = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/categorias/" . $imagen;
            copy($ruta, $destino);
            $nuevaCategoria->imagen=$imagen;
        }
        $nuevaCategoria->save();
    }
    public function store(Request $request){
        $this->nuevaCtegoria($request);
        return redirect()->route("categorias.index")
            ->with("exito","Se creo exitosamente la categoría");
    }

    public function stor(Request $request){
        $this->nuevaCtegoria($request);
        return redirect()->route("producto.nuevo")
            ->with("exito","Se creo exitosamente la categoría");
    }
    public function sto(Request $request){
        $this->nuevaCtegoria($request);
        return redirect()->route("servicios.crear")
            ->with("exito","Se creo exitosamente la categoría");
    }

    public function editar($id){
        return view("categorias.editar_categoria")
            ->with("categoria",Categoria::findOrFail($id));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "nombre"=>"required|max:80|unique:categorias,nombre,".$id,
            "imagen_url"=>"image",

        ],[
            "nombre.required"=>"Se debe ingresar el nombre de la categoría.",
            "nombre.unique"=>"El nombre de la categoría debe ser unico.",
            "nombre.max"=>"El nombre de la categoría debe ser menor a 80 caracteres",
            "imagen_url.image"=>"Tiene que elegir una imagen real."
        ]);

        $editarCategoria= Categoria::findOrfail($request->id);
        $editarCategoria->nombre= $request->input("nombre");
        $path = public_path() . '\images\categorias';//Carpeta publica de las imagenes
        if($request->imagen_url){
            /***Si la imagen es enviada por el usuario se debe eliminar la anterior **/
            $img_anterior=public_path()."/images/categorias/".$editarCategoria->imagen;
            if (File::exists($img_anterior)){
                File::delete($img_anterior);
            }
            $imagen = $_FILES["imagen_url"]["name"];
            $ruta = $_FILES["imagen_url"]["tmp_name"];
            //-------------VALIDAR SI LA CARPETA EXISTE---------------------
            if (!file_exists($path)) {
                mkdir($path, 0777, true);

            }
            //-------------------------------------------------------------
            $destino = "images/categorias/" . $imagen;
            copy($ruta, $destino);
            $editarCategoria->imagen=$imagen;
        }

        $editarCategoria->save();

        return redirect()->route("categorias.index")
            ->with("exito","Se editó correctamente la categoría");
    }

    //Metodo para borrar una categoria desde la tabla
    public function destroy($id){

        $categoria = Categoria::findOrfail($id);
        $categoriaAsignadaAProducto = Producto::where("id_categoria","=",$id)->get();

        if($categoriaAsignadaAProducto->count()>0){
            return redirect()->route("categorias.index")
                ->with("error","No se puede eliminar la categoría porque ya esta asignada a Productos");
        }
        /***Si la imagen exite se debe eliminar  **/
        $img_anterior=public_path()."/images/categorias/".$categoria->imagen;
        if (File::exists($img_anterior)){
            File::delete($img_anterior);
        }
        $categoria->delete();
        return redirect()->route("categorias.index")
            ->with("exito","Se eliminó correctamente la categoría");
    }
}
