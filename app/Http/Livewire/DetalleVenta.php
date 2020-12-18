<?php

namespace App\Http\Livewire;

use App\Models\Venta;
use Livewire\Component;

class DetalleVenta extends Component
{
    public $venta;
    public $detalle_venta;
    public function render()
    {
        return view('livewire.ventas.detalle-venta')
            ->extends("layouts.main")
            ->section("content");
    }
    public function mount($id){
        $this->venta=Venta::findOrFail($id);
        $this->detalle_venta = \App\Models\DetalleVenta::where("id_venta","=",$this->venta->id)->get();
    }
}
