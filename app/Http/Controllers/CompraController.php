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
    /*public function index(Request $request){
        $compras = DB::table('compras')
            ->join('users', 'compras.id_usuario', '=', 'users.id')
            ->join('proveedors', 'compras.id_proveedore', '=', 'proveedors.id')
            ->join('detalle_compras as d', 'compras.id', '=', 'd.id_compra')
            ->select('compras.*','proveedors.nombre','users.name')
            ->get();
        return view("compras.mostrarCompras")
            ->with("compras",$compras);
    }*/

   public function index(Request $request){
     $query = trim($request->get('searchText'));
        $compras = DB::table('compras as c')
            ->join('users as s', 'c.id_usuario', '=', 's.id')
            ->join('proveedors as p', 'c.id_proveedore', '=', 'p.id')
            ->join('detalle_compras as d', 'c.id', '=', 'd.id_compra')
            ->select('c.*','p.nombre','s.name',
                DB::raw('SUM(costo_compra*cantidad) as total'))
           // ->where('c.numero_comprobante', 'LIKE', '%'..'%')
               ->orderBy('c.id','desc')
               ->groupBy('c.id','c.feche_hora','c.numero_comprobante','p.nombre','s.name','c.impuesto')
            ->get();
        return view("compras.mostrarCompras",["compras"=>$compras,"searchText"=>$query]);

    }

    public function crear(){
        $users=User::all();
        $proveedores=Proveedor::all();
        $compras= Compra::all();
        $detalles=Detalle_compra::all();
        return view("compras.crearCompra")
            ->with("compras",$compras)
            ->with("proveedores",$proveedores)
            ->with("users",$users)
            ->with("detalles",$detalles);
    }

   public function store(Request $request){

       try {
           DB::beginTransaction();
           $nuevaCompra=new Compra();
           $nuevaCompra->id_usuario= $request->input("id_usuario");
           $nuevaCompra->id_proveedore= $request->input("id_proveedore");
           $nuevaCompra->impuesto= $request->input("impuesto");
           $nuevaCompra->numero_comprobante= $request->input("numero_comprobante");
           $mytime=Carbon::now('America/tegucigalpa');
           $nuevaCompra->feche_hora = $mytime->toDateTimeLocalString();
           $nuevaCompra->save();

           $id_producto = $request->input("id_producto");
           $costo_compra = $request->input("costo_compra");
           $costo_venta = $request->input("costo_venta");
           $cantidad = $request->input("cantidad");

           $cont = 0;
           while($cont < count($id_producto))
           {
               $detalle = new Detalle_compra();
               $detalle->id_compra=$nuevaCompra->id_compra;
               $detalle->id_producto = $id_producto[$cont];
               $detalle->costo_venta=$costo_venta[$cont];
               $detalle->costo_compra=$costo_compra[$cont];
               $detalle->cantidad=$cantidad->cantidad[$cont];
               $detalle->save();
               $cont = $cont=1;
           }
           DB::commit();
       }catch(\Exception $exception){
           DB::rollBack();
       }
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");
    }

    public function show($id)
    {
        $compra = DB::table('compras as c')
            ->join('users as s', 'c.id_usuario', '=', 's.id')
            ->join('proveedors as p', 'c.id_proveedore', '=', 'p.id')
            ->join('detalle_compras as d', 'c.id', '=', 'd.id_compra')
            ->select('c.id','c.feche_hora','c.numero_comprobante','p.nombre',
                DB::raw('SUM(costo_compra*cantidad) as total'))
            ->where('c.id','=',$id)
            ->first();
        $detalles = DB::table('detalle_compras as d')
            ->join('productos as pr','d.id_producto','=','p.id')
            ->select()
            ->where()
            ->get();
        return view("compras.mostrarCompras")
            ->with("compra",$compra)
            ->with("detalle",$detalles);
    }

    public function destroy($id){
        $compra = Compra::findOrfail($id);
        $compra->delete();
        return redirect()->route("compras.index")
            ->with("exito","Se elimino correctamente la compra");
    }

}
