<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasTotalUserController extends Controller
{
    public function total(Request $request
    ){
        $total = DB::table('ventas')
            ->join('users as u','u.id','=','id_usuario')
            ->join('detalle_ventas as d', 'd.id_venta', '=', 'ventas.id')
            ->select('fecha_venta','id_usuario','usuario','name',
                DB::raw('SUM(d.costo_venta*d.cantidad) as total'))
             ->groupBy('fecha_venta','id_usuario')
            ->orderBy('fecha_venta')
            ->paginate(8);
        return view("livewire.ventas.total_ventas_user")
            ->with("total",$total);
    }
    public function buscar(Request $request){
        $busqueda = $request->input("busqueda");
        $total = DB::table('ventas')
            ->join('users as u','u.id','=','id_usuario')
            ->join('detalle_ventas as d', 'd.id_venta', '=', 'ventas.id')
            ->select('fecha_venta','id_usuario','usuario','name',
                DB::raw('SUM(d.costo_venta*d.cantidad) as total'))
            ->where("usuario","like","%".$request->input("busqueda")."%")
            ->groupBy('fecha_venta','id_usuario')
            ->orderBy('fecha_venta')
            ->paginate(8);
        return view("livewire.ventas.total_ventas_user")
            ->with("total",$total)->with("busqueda",$busqueda);

    }
}
