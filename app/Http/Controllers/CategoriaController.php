<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index (){
      //  $categorias = Categoria::all();
        return view("categorias");//->with("categorias",$categorias);


    }
    public function nuevo(){
        return view("nueva_categoria");
    }

}
