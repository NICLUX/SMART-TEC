<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::paginate(10);
        return view("clientes.clientess_index")->with("clientes",$clientes);
    }

    public function nuevo(){
        return view("clientes.nuevo_cliente");
    }

    public function store(Request  $request){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|max:99999999|unique:clientes,telefono"
        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del cliente.",
            "nombre.max"=>"El nombre no debe ser máximo a 80 caracteres.",
            "direccion.required"=>"Se requiere ingresar la dirección del cliente.",
            "direccion.max"=>"La dirección debe ser menor a 80 caracteres",
            "telefono.required"=>"Se requiere ingresar el télefono del cliente",
            "telefono.max"=>"El télefono debe ser menor a 8 caracteres",
            "telefono.unique"=>"El télefono ya ha sido registrado."
        ]);

        $cliente = new Cliente();
        $cliente->nombre=$request->input("nombre");
        $cliente->direccion= $request->input("direccion");
        $cliente->telefono= $request->input("telefono");

        $cliente->save();

        return redirect()->route("clientes.index")->with("exito","Se registró exitosamente el cliente");

    }


    public function editar($id){
        $cliente = Cliente::findOrFail($id);
        return view("clientes.editar_cliente")->with("cliente",$cliente);

    }
    public function update(Request  $request,$id){
        $this->validate($request,[
            "nombre"=>"required|max:80",
            "direccion"=>"required|max:80",
            "telefono"=>"required|max:99999999|unique:clientes,telefono,".$id
        ],[
            "nombre.required"=>"Se requiere ingresar el nombre del cliente.",
            "nombre.max"=>"El nombre no debe ser máximo a 80 caracteres.",
            "direccion.required"=>"Se requiere ingresar la dirección del cliente.",
            "direccion.max"=>"La dirección debe ser menor a 80 caracteres",
            "telefono.required"=>"Se requiere ingresar el télefono del cliente",
            "telefono.max"=>"El télefono debe ser menor a 8 caracteres",
            "telefono.unique"=>"El télefono ya ha sido registrado."
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->nombre=$request->input("nombre");
        $cliente->direccion= $request->input("direccion");
        $cliente->telefono= $request->input("telefono");

        $cliente->save();

        return redirect()->route("clientes.index")
            ->with("exito","Se editó exitosamente el cliente");
    }

    public function destroy($id){
        $cliente = Cliente::findOrfail($id);
        $cliente->delete();


        //TODO en caso de que el cliente este relacionado con otra tabla, deben borrarse los registros antes.
        return redirect()->route("clientes.index")
            ->with("exito","Se eliminó exitosamente el cliente");
    }

}
