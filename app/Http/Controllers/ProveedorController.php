<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        $proveedor = Proveedor::all();
        return view("proveedor")->with("proveedor",$proveedor);
    }
    //
}
