<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public  function index(){
        $productos = Producto::paginate(10);
        return view("productos.productos_index")->with("productos",$productos);
    }

    public function nuevo(){
        $categorias = Categoria::all();
        return view("productos.nuevo_producto")->with("categorias",$categorias);
    }

}
