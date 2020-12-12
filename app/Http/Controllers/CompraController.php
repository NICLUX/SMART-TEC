<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Detalle_compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Http\Request\ComprasFromRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CompraController extends Controller
{
    public function index(){
        $compras= Compra::paginate(10);
        return view("compras.mostrarCompras")->with("compras",$compras);
    }

    public function crear(){
        $compras= Compra::all();
        return view("compras.crearCompra")->with("compras",$compras);
    }
   public function store(Request $request){
        $this->validate($request,[
            "total_compra" =>"required|numeric"
            ],[
            "total_compra.required" => "Se requiere el costo de venta.",
            "total_compra.numeric" => "Se requiere que el costo de venta sea un numero",
            ]);
        $nuevaCompra=new Compra();
        $nuevaCompra->id_usuario= $request->input("id_usuario");
        $nuevaCompra->id_proveedores= $request->input("id_proveedores");
        $nuevaCompra->total_compra= $request->input("total_compra");
        $nuevaCompra->save();
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");
    }

    public function edit($id)
    {
        $compras = Compra::findOrFail($id);
        return view('compras.editCompras')->with('compras', $compras);
    }


    public function destroy($id){
        $compra = Compra::findOrfail($id);
        $compra->delete();
        return redirect()->route("compras.index")
            ->with("exito","Se elimino correctamente la compra");
    }

}
