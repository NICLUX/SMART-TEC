<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use App\Models\Compra;
use App\Models\Detalle_compra;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleCompraController extends Controller
{
    public function index(){
        $compras = Compra::paginate(10);

        return view("compras.mostrarCompras")->with("compras",$compras);
    }

    public function nuevo(){
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
                $cont = $cont+1;
            }
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
        }
        return redirect()->route("compras.index")->with("exito","Se registró exitosamente");
    }

    public function calcularTotalPagar()
    {
        if ($this->id_compras) {
            $this->total_compras = DB::table("detalle_compras")
                ->select(DB::raw("sum(costo_compra * cantidad) as compra"))
                ->where("id_compra", "=", $this->id_compra)
                ->value("compra");
        } else {
            $this->total_venta = 0.00;
        }
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
