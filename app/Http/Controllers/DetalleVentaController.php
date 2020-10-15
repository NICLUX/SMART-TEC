<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index (Request $request){
        $ventas = Venta::all();
    }


    public function create(){
    }

    public function edit(){

    }

    public function destroy(){
        Venta::destroy();
    }
}
