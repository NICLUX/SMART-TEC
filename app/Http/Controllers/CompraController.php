<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Inventario;
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
        if ($request){
            $query=trim($request->get('searchText'));
            $compras = DB::table('compras as c')
                ->join('users as s', 'c.id_usuario', '=', 's.id')
                ->join('proveedors as p', 'c.id_proveedore', '=', 'p.id')
                ->join('detalle_compras as d', 'c.id', '=', 'd.id_compra')
                ->select('c.*','p.nombre','s.name',
                    DB::raw('SUM(costo_compra*cantidad) as total'))
                ->where('c.numero_comprobante', 'LIKE', '%'.$query.'%')
                ->groupBy('c.id','c.feche_hora','c.numero_comprobante','p.nombre','s.name','c.impuesto')
                ->paginate(8);
            return view("compras.mostrarCompras")
                ->with("compras",$compras);
        }
    }
    public function crear(){
        $users=User::all();
        $productos = Producto::all();
        $proveedores=Proveedor::all();
        $compras= Compra::all();
        $detalles=Detalle_compra::all();
        return view("compras.detalle")
            ->with("compras",$compras)
            ->with("proveedores",$proveedores)
            ->with("users",$users)
            ->with("productos",$productos)
            ->with("detalles",$detalles);
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_usuario' => "required",
            "id_proveedore" => "required",
            "impuesto"=>"required|numeric",
            "numero_comprobante"=>"required",

        ], [
            "id_usuario.required" => "Se requiere ingresar el nombre de usuario",
            "id_proveedore.required" => "Se requiere ingresar el nombre del proveedor",
            "impusto.required"=>"se requiere ingrese el impuesto",
            "numero_comprobante"=>"se requiere imngrese el numero de comprovante"
        ]);
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
            $detalle->id_compra=$nuevaCompra->id;
            $detalle->id_producto = $id_producto[$cont];
            $detalle->costo_venta=$costo_venta[$cont];
            $detalle->costo_compra=$costo_compra[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->save();
            $cont = $cont+1;
        }
        $this->inventario($request);
        DB::commit();
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");
    }

    public function inventario(Request $request){

        $id_producto = $request->input("id_producto");
        $cantidad = $request->input("cantidad");
        $cont = 0;
        while($cont < count($id_producto))
        {
            $detalle = new Inventario();
            $detalle->id_producto = $id_producto[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->save();
            $cont = $cont+1;
        }
    }
    public function show($id)
    {
        $compra = DB::table('compras as c')
            ->join('users as s', 'c.id_usuario', '=', 's.id')
            ->join('proveedors as p', 'c.id_proveedore', '=', 'p.id')
            ->join('detalle_compras as d', 'c.id', '=', 'd.id_compra')
            ->select('c.*','p.nombre','s.name','d.costo_compra',
                DB::raw('SUM(d.costo_compra*d.cantidad) as total'))
            ->where('c.id','=',$id)
            ->groupBy('c.id','c.feche_hora','c.numero_comprobante','p.nombre','s.name','c.impuesto','d.costo_compra')
            ->first();
        $detalles=DB::table('detalle_compras as d')
            ->join('productos as pr', 'd.id_producto', '=', 'pr.id')
            ->join('compras as c', 'd.id_compra', '=', 'c.id')
            ->select('d.costo_compra','d.costo_venta','d.cantidad','pr.nombre','pr.imagen_url'
                ,DB::raw('(d.costo_compra*d.cantidad) as total'))
            ->where('c.id','=',$id)
            ->groupBy('d.costo_compra','d.costo_venta','d.cantidad','pr.nombre','pr.imagen_url')
            ->get();
        return view("d_compras.d_compras")->with("compra",$compra)->with("detalles",$detalles);
    }
    public function destroy($id){
        $compra = Compra::findOrfail($id);
        $detalle = Detalle_compra::findOrfail($id);
        $compra->delete();
        $detalle->delete();
        return redirect()->route("compras.index")
            ->with("exito","Se elimino correctamente la compra");
    }

}
