<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        $proveedores = Proveedor::paginate(10);
        return view("proveedores.proveedores_index")->with("proveedores",$proveedores);
    }

    public function nuevo(){
        return view("proveedores.registrar_proveedor");
    }

    public function store(Request  $request){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "email"=>"unique:proveedors,email|max:100",
            "descripcion"=>"max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|unique:proveedors,telefono|max:99999999",

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del proveedor",
            "email.unique"=>"El correo ya ha sido registrado.",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "direccion.required"=>"La dirección se requiere.",
            "telefono.unique"=>"El télefono ya ha sido registrado",
            "telefono.max"=>"El telefono debe ser menor a 8 caracteres",
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre= $request->input("nombre");
        $proveedor->descripcion= $request->input("descripcion");
        $proveedor->email= $request->input("email");
        $proveedor->telefono=$request->input("telefono");
        $proveedor->direccion = $request->input("direccion");
        $proveedor->save();

        return redirect()->route("proveedores.index")
            ->with("exito","Se creó exitosamente el proveedor");


    }

    public function stor(Request  $request){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "email"=>"unique:proveedors,email|max:100",
            "descripcion"=>"max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|unique:proveedors,telefono|max:99999999",

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del proveedor",
            "email.unique"=>"El correo ya ha sido registrado.",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "direccion.required"=>"La dirección se requiere.",
            "telefono.unique"=>"El télefono ya ha sido registrado",
            "telefono.max"=>"El telefono debe ser menor a 8 caracteres",
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre= $request->input("nombre");
        $proveedor->descripcion= $request->input("descripcion");
        $proveedor->email= $request->input("email");
        $proveedor->telefono=$request->input("telefono");
        $proveedor->direccion = $request->input("direccion");
        $proveedor->save();

        return redirect()->route("compras.nuevo")
            ->with("exito","Se creó exitosamente el proveedor");


    }
   /* public function stor(Request  $request){
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "email"=>"unique:proveedors,email|max:100",
            "descripcion"=>"max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|unique:proveedors,telefono|max:99999999",
        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del proveedor",
            "email.unique"=>"El correo ya ha sido registrado.",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "direccion.required"=>"La dirección se requiere.",
            "telefono.unique"=>"El télefono ya ha sido registrado",
            "telefono.max"=>"El telefono debe ser menor a 8 caracteres",
        ]);
        $proveedor = new Proveedor();
        $proveedor->nombre= $request->input("nombre");
        $proveedor->descripcion= $request->input("descripcion");
        $proveedor->email= $request->input("email");
        $proveedor->telefono=$request->input("telefono");
        $proveedor->direccion = $request->input("direccion");
        $proveedor->save();
        return view("compras.ProductosCompras")
            ->with("productos",$productos)
            ->with("categorias", $categorias)
            ->with("proveedores",$proveedores)
            ->with("exito", "Se creo exitosamente el proveedor.");
    }*/
    public function editar($id){
        $proveedor = Proveedor::findOrFail($id);
        return view("proveedores.editar_proveedor")->with("proveedor",$proveedor);
    }
    public  function update(Request $request,$id){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "email"=>"unique:proveedors,email,".$id,
            "descripcion"=>"max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|max:99999999|unique:proveedors,telefono,".$id,

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del proveedor",
            "email.unique"=>"El correo ya ha sido registrado.",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "direccion.required"=>"La dirección se requiere.",
            "telefono.unique"=>"El télefono ya ha sido registrado",
            "telefono.max"=>"El telefono debe ser menor a 8 caracteres",
        ]);
        $proveedor =  Proveedor::findOrFail($id);
        $proveedor->nombre= $request->input("nombre");
        $proveedor->descripcion= $request->input("descripcion");
        $proveedor->email= $request->input("email");
        $proveedor->telefono=$request->input("telefono");
        $proveedor->direccion = $request->input("direccion");
        $proveedor->save();

        return redirect()->route("proveedores.index")
            ->with("exito","Se editó exitosamente el proveedor");
    }

    public function destroy($id){
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route("proveedores.index")
            ->with("exito","Se eliminó exitosamente el proveedor");

    }

}
