<?php

namespace App\Http\Controllers;

use App\Models\Detalle_compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function index(){
        $detalle_compras = Detalle_compra::paginate(10);
        return view("d_compras.d_Compras")->with("detalle_compras",$detalle_compras);
    }
    public function mostrarCompras()
    {
        $detalle_compras= Detalle_compra::all();
        return view("compras.mostrarCompras")
            ->with("detalle_compras", $detalle_compras);
    }

    public function nuevo(){
        $proveedores = Proveedor::all();
        $detalle_compra = Detalle_compra::all();
        return view("d_compras.crear_dCompra")
            ->with("detalle_compra",$detalle_compra)
            ->with("proveedores", $proveedores);
    }
    public function store(Request $request){
        $this->validate($request, [
            "nombre" => "required|max:80",
            "costo_compra" => "required|numeric",
            "descripcion" => "max:100",
            "cantidad" =>"required|numeric"
        ], [
            "nombre.required" => "Se requiere ingresar el nombre",
            "nombre.max" => "El nombre debe ser menor o igual que 80 caracteres",
            "costo_compra.required" => "Se requiere que ingrese el costo de compra",
            "costo_compra.numeric" => "El costo de compra debe ser un numero",
            "cantidad.required" => "Se requiere el costo de venta.",
            "cantidad.numeric" => "Se requiere que el costo de venta sea un numero",
            "descripcion.max" => "La descripcion debe ser menor o igual que 100 caracteres"
        ]);
        $nuevaCompra=new Detalle_compra();
        $nuevaCompra->nombre = $request->input("nombre");
        $nuevaCompra->id_proveedor= $request->input("id_proveedor");
        $nuevaCompra->costo_compra = $request->input("costo_compra");
        $nuevaCompra->cantidad = $request->input("cantidad");
        $nuevaCompra->descripcion = $request->input("descripcion");
        $nuevaCompra->save();
        return redirect()->route("DetalleCompras.index")->with("exito","Se registró exitosamente");
    }
    public function editar($id)
    {
        $proveedores = Proveedor::all();
        $detalle_compras = Detalle_compra::findOrFail($id);
        return view("d_compras.edit_Dcompra")
            ->with("detalle_compras",$detalle_compras)
            ->with("proveedores", $proveedores);
    }
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            "nombre" => "required|max:80",
            "costo_compra" => "required|numeric",
            "cantidad" => "required|numeric",
            "descripcion" => "max:80"
        ], [
            "nombre.required" => "Se requiere ingresar el nombre",
            "nombre.max" => "El nombre debe ser menor o igual que 80 caracteres",
            "costo_compra.required" => "Se requiere que ingrese el costo de compra",
            "costo_compra.numeric" => "El costo de compra debe ser un numero",
            "cantidad.required" => "Se requiere el costo de venta.",
            "cantidad.numeric" => "Se requiere que el costo de venta sea un numero",
            "descripcion.max" => "La descripcion debe ser menor o igual que 80 caracteres"
        ]);
        $actualizarcompra = Detalle_compra::findOrFail($id);
        $actualizarcompra->nombre = $request->input("nombre");
        $actualizarcompra->costo_compra = $request->input("costo_compra");
        $actualizarcompra->id_proveedor= $request->input("id_proveedor");
        $actualizarcompra->cantidad = $request->input("cantidad");
        $actualizarcompra->descripcion = $request->input("descripcion");
        $actualizarcompra->save();
        return redirect()->route("DetalleCompras.index")
            ->with("exito", "Se actualizo exitosamente la compra.");
    }
    public function destroy($id)
    {
        $detalle_compra= Detalle_compra::findOrFail($id);
        $detalle_compra->delete();
        return redirect()->route("DetalleCompras.index")
            ->with("exito", "Se elimino exitosamente la compra.");
    }
}
