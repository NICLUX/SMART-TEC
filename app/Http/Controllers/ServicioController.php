<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index (){
        return view('servicio');
    }

    public function store(request $request){

        //validar
        $request->validate([
            'nombre'=>'required|alpha',
            'descripcion'=>'alpha',
            'costo_venta'=>'required|number',
            'id_categoria'=>'required|alpha',
        ]);

        //formulario
        $nuevoServicio = new Servicio();
        $nuevoServicio->nombre = $request->input('nombre');
        $nuevoServicio->descripcion= $request->input('descripcion');
        $nuevoServicio->costo_venta = $request->input('costo');
        $nuevoServicio->id_categoria = $request->input(' categoria');

        //ciclo if
        $creado = $nuevoServicio->save();

        if ($creado){
            return redirect()->route('servicios.index')
                ->with('mensaje', 'Creado exitosamente.');
        }else{
            //retornar errores
        }
    }
}
