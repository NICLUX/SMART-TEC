<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index (){
        $ventas = Venta::with("detalle")->orderBy("fecha_venta","asc");
        return view('venta')->with("ventas",$ventas);
    }
}
