<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(){
        $compras= Compra::paginate(10);
        return view("mostrarCompras")->with("compras",$compras);
    }

    public function crear(){
        $compras= Compra::all();
        return view("crearCompra")->with("compras",$compras);
    }

   public function store(Request $request){
        $this->validate($request,[
        ]);

        $nuevaCompra=new Compra();
        $nuevaCompra->id_usuario= $request->input("id_usuario");
        $nuevaCompra->id_proveedores= $request->input("id_proveedores");
        $nuevaCompra->total_compra= $request->input("total_compra");
        $nuevaCompra->save();
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");

    }

}
