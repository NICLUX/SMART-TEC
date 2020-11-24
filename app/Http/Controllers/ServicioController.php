<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
        public function index (){
            $servicios = Servicio::paginate(10);
            return view("servicios.servicio")->with("servicios", $servicios);
    }

    public function nuevaVista(){
        $servicios = Servicio::paginate(10);
        return view("servicios.vista_tabla_servicios")->with("servicios", $servicios);
    }

    public function buscarServicio(Request $request)
    {
        $busqueda = $request->input("busqueda");
        $servicios = Servicio::where("nombre",
            "like", "%" . $request->input("busqueda") . "%")
            ->paginate(10);

        return view("servicio")
            ->with("busqueda", $busqueda)->with("servicios", $servicios);

    }


    public function create(){

        $categorias = Categoria::all();
        return view("servicios.agregar_servicio")->with("categorias", $categorias);
    }


    public function store(request $request){
        $this->validate($request,[
            "nombre"=>"required|max:80|alpha",
            "descripcion"=>"max:80|alpha",
            "costo_venta"=>"numeric|min:0",

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del servicio",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "costo_venta.numeric"=>"Se requiere que el costo de venta sea un numero",
        ]);


        $nuevoServicio = new Servicio();
        $nuevoServicio->nombre= $request->input("nombre");
        $nuevoServicio->descripcion= $request->input("descripcion");
        $nuevoServicio->costo_venta= $request->input("costo_venta");
        $nuevoServicio->id_categoria= $request->input("id_categoria");

        $creado = $nuevoServicio->save();

        if ($creado){
            return redirect()->route('servicios.index')
                ->with('mensaje', 'El servicio fue creado exitosamente.');
        }
    }

        public function edit($id){
            $servicio = Servicio::findOrFail($id);
            $categorias = Categoria::all();
            return view("servicios.editar_servicio")
                ->withCategorias($categorias)
                ->with("servicio", $servicio);
        }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "nombre"=>"required|max:80|alpha",
            "descripcion"=>"max:80|alpha",
            "costo_venta"=>"numeric|min:0",

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del servicio",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "costo_venta.numeric"=>"Se requiere que el costo de venta sea un numero",
        ]);

        $actualizarServicio = Servicio::findOrFail($id);
        $actualizarServicio->descripcion= $request->input("descripcion");
        $actualizarServicio->costo_venta= $request->input("costo_venta");

        $actualizarServicio->save();

        return redirect()->route("servicios.index")
            ->with("exito", "Se actualizo exitosamente el servicio.");
    }

        public function destroy($id){
            $servicios= Servicio::findOrFail($id);
            $servicios->delete();

            return redirect()->route("servicios.index")
                ->with("exito", "Se elimino exitosamente el servicio.");
        }

}
