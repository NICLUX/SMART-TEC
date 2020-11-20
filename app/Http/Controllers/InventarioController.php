<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::paginate();
        return view("inventario.inventario_index")->with("inventarios", $inventarios);
    }

    public function nuevo()
    {
        $productos = Producto::orderBy("nombre", "asc")->get();
        return view("inventario.nuevo_inventario")->with("productos", $productos);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_producto" => "required",
            "cantidad" => "required|numeric|min:0"
        ], [
            "id_producto.required" => "Se requiere que seleccione un producto",
            "cantidad.required" => "La cantidad de producto en stock debe ser ingresada",
            "cantidad.numeric" => "La cantidad de producto en stock debe ser un numero",
            "cantidad.min" => "El minimo de cantidad es 0"
        ]);

        $inventarioExiteRegistro = Inventario::where("id_producto", $request->input("id_producto"))->get();
        if($inventarioExiteRegistro->count()>0){
            return redirect()->route("inventario.nuevo")
                ->with("error","No se puede registrar el inventario de este producto porque ya esta registrado anteriormente")
                ->withInput();
        }
        $inventario = new Inventario();
        $inventario->id_producto = $request->input("id_producto");
        $inventario->cantidad = $request->input("cantidad");
        $inventario->save();

        return redirect()->route("inventario.index")->with("exito", "Se registro el nuevo producto en stock");


    }

    public function editar($id)
    {
        $productos = Producto::orderBy("nombre", "asc")->get();
        $inventario = Inventario::findOrFail($id);
        return view("inventario.editar_inventario")
            ->with("productos",$productos)->with("inventario", $inventario);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "id_producto" => "required",
            "cantidad" => "required|numeric|min:0"
        ], [
            "id_producto.required" => "Se requiere que seleccione un producto",
            "cantidad.required" => "La cantidad de producto en stock debe ser ingresada",
            "cantidad.numeric" => "La cantidad de producto en stock debe ser un numero",
            "cantidad.min" => "El minimo de cantidad es 0"
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->id_producto = $request->input("id_producto");
        $inventario->cantidad = $request->input("cantidad");
        $inventario->save();

        return redirect()->route("inventario.index")->with("exito", "Se edito el producto en stock");

    }

    public function destroy($id){
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return redirect()->route("inventario.index")->with("exito", "Se elimino el producto en stock con exito");
    }


}
