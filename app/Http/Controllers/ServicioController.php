<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
        public function index (){
            $servicios = Servicio::paginate(10);
            return view("servicio")->with("servicios", $servicios)->with('id_categoria');
    }


    public function create(){
        $servicios = Servicio::paginate(10);
        return view("agregar_servicio")->with("servicios", $servicios);
    }


    public function store(request $request){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "descripcion"=>"max:80",
            "costo_venta"=>"numeric|min:0",
            "id_categoria"=>"alpha",

        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del servicio",
            "descripcion.max"=>"La descripción debe ser menor a 80 caracteres",
            "costo_venta.required"=>"se requiere ingresar el costo de venta",
            "id_categoria.alpha"=>"la categoria debe ser alpha",
        ]);


        $nuevoServicio = new Servicio();
        $nuevoServicio->nombre= $request->input("nombre");
        $nuevoServicio->descripcion= $request->input("descripcion");
        $nuevoServicio->costo_venta= $request->input("costo_venta");
        $nuevoServicio->id_categoria= $request->input("id_categoria");

        $creado = $nuevoServicio->save();

        if ($creado){
            return redirect()->route('servicio.index')
                ->with('mensaje', 'El servicio fue creado exitosamente.');
        }
    }

        public function edit($id){
            $servicios = Servicio::findOrFail($id);
            return view("editar_servicio")
                ->with("servicio", $servicios);
        }

    public function update(Request $request)
    {
        $this->validate($request, []);

        $editarServicio = Servicio::findOrfail($request);
        $editarServicio->nombre = $request->input("nombre");
        $editarServicio->descripcion = $request->input("descripcion");
        $editarServicio->costo_venta = $request->input("costo_venta");
        $editarServicio->id_categoria = $request->input("id_categoria");
        $editarServicio->save();

        return redirect()->route("servicios.index")->with("exito", "registro actualizado correctamente");
    }


        //Metodo para borrar un servicio desde la tabla
        public function destroy($id){

            $servicios = Servicio::findOrfail($id);
            $servicios->delete();
            return redirect()->route("servicios.index")
                ->with("exito","Se elimino correctamente el servicio");
        }

}
