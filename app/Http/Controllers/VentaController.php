<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use Illuminate\Http\Request;

use Dompdf\Dompdf;

class VentaController extends Controller
{

    public function index (){
        $ventas = Venta::with("detalle")->orderBy("fecha_venta","asc");
        return view('venta')->with("ventas",$ventas);
    }


    public function __invoke($id)
    {
        $venta = Venta::where("id","=",$id)->get();
        $cliente = Cliente::where("id","=",$venta[0]->id_cliente)->get();

        $vista = view('factura')->with('id',$id)->with('fecha_venta',$venta[0]->fecha_venta)
        ->with('cliente',$cliente)
            ->with('detalle_ventas',$venta[0]->getDetalleVenta())->with("vendedor", $venta[0]
                ->getUsuarioAttribute()->usuario);

            $dompdf = new Dompdf();
            $dompdf->loadHtml($vista);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("Factura-N#".$venta[0]->id."-".$venta[0]->fecha_venta.".pdf");
    }


}
