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
    //Metodo para mostrar un formulario para crear una nueva categoria
    public function nuevo(){
        return view("categorias.nueva_categoria");
    }
    public function store(Request $request){
        $this->validate($request,[
            "nombre"=>"required|max:80|unique:categorias,nombre",

        ],[
            "nombre.required"=>"Se debe ingresar el nombre de la categoria.",
            "nombre.unique"=>"El nombre de la categoria debe ser unico.",
            "nombre.max"=>"El nombre de la categoria debe ser menor a 80 caracteres"
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

        return redirect()->route("categorias.index")
            ->with("exito","Se creo exitosamente la categoria");
    }
    public function editar($id){
        return view("categorias.editar_categoria")
            ->with("categoria",Categoria::findOrFail($id));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            "nombre"=>"required|max:80|unique:categorias,nombre,".$id,

        ],[
            "nombre.required"=>"Se debe ingresar el nombre de la categoria.",
            "nombre.unique"=>"El nombre de la categoria debe ser unico.",
            "nombre.max"=>"El nombre de la categoria debe ser menor a 80 caracteres"
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
            ->with("exito","Se edito correctamente la categoria");
    }

    //Metodo para borrar una categoria desde la tabla
    public function destroy($id){

        $categoria = Categoria::findOrfail($id);
        $categoriaAsignadaAProducto = Producto::where("id_categoria","=",$id)->get();

        if($categoriaAsignadaAProducto->count()>0){
            return redirect()->route("categorias.index")
                ->with("error","No se puede eliminar la categoria porque ya esta asignada a Productos");
        }
        /***Si la imagen exite se debe eliminar  **/
        $img_anterior=public_path()."/images/categorias/".$categoria->imagen;
        if (File::exists($img_anterior)){
            File::delete($img_anterior);
        }
        $categoria->delete();
        return redirect()->route("categorias.index")
            ->with("exito","Se elimino correctamente la categoria");
    }
}
