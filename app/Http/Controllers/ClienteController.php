<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        return view("cliente")->with("cliente",$cliente);
    }
    //
}
