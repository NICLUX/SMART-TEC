<?php

namespace App\Http\Livewire;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;
    public function render()
    {
        $ventas = Venta::orderBy("fecha_venta","asc")->paginate(10);

        return view('livewire.ventas.ventas')
            ->with("ventas",$ventas)
            ->extends("layouts.main")
            ->section("content");
    }

    public function eliminarVenta($id){
        $venta = Venta::findOrFail($id);
        $detalleVentas=DetalleVenta::where("id_venta","=",$id)->get();

        foreach ($detalleVentas as $detalleVenta) {
            $detalleVenta->delete();
        }

        $venta->delete();
        session()->flash("exito","Se eliminó la venta y su detalle de venta respectivo.");
    }
}
