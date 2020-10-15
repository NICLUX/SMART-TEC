<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(){
        //$compras= Compra::paginate(10);
        return view("mostrarCompras");//->with("compras",$compras);
    }



   /* public function store(Request $request){
        $this->validate($request,[
        ]);

        $nuevaCompra=new Compra();
        $nuevaCompra->cantidad= $request->input("cantidad");
        $nuevaCompra->save();
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");

    }*/

}
