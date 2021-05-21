<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::paginate(10);
        return view("Servicios.vista_tabla_servicios")->with("servicios", $servicios);
    }
    public function mostrar()
    {
        $servicios = Servicio::paginate(10);
        return view("Servicios.servicio")->with("servicios", $servicios);
    }
}
