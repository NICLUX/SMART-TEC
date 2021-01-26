<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Http\Request\ComprasFromRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class CompraController extends Controller
{

 public function __construct()
 {

 }
    public function index(Request $request){
        $compras = DB::table('compras')
            ->join('users', 'compras.id_usuario', '=', 'users.id')
            ->join('proveedors', 'compras.id_proveedores', '=', 'proveedors.id')
            ->join('productos', 'compras.id_producto', '=', 'productos.id')
            ->select('compras.*','proveedors.nombre','users.name')
            ->get();
        return view("compras.mostrarCompras")
            ->with("compras",$compras);
    }
    public function crear(){
        $users=User::all();
        $proveedores=Proveedor::all();
        $compras= Compra::all();
        return view("compras.crearCompra")
            ->with("compras",$compras)
            ->with("proveedores",$proveedores)
            ->with("users",$users);
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
