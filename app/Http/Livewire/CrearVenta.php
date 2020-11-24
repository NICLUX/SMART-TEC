<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Producto;
use Livewire\Component;

class CrearVenta extends Component
{
    public $clientes;
    public $id_cliente;
    public $fecha_venta;
    public $total_venta;
    public $id_productos;
    public $productos;

    public function render()
    {
        return view('livewire.ventas.crear-venta')
            ->extends("layouts.main")
            ->section("content");
    }
    public function mount(){
        $this->clientes=Cliente::orderBy("nombre","ASC")->get();
        $this->fecha_venta=date("yy-m-d");
        $this->productos=Producto::orderBy("nombre","ASC")->get();
    }

    public function guardarVenta(){

    }
}
