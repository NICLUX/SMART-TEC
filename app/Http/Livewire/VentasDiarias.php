<?php

namespace App\Http\Livewire;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class VentasDiarias extends Component
{
    use WithPagination;
    public $fecha;
    public $busqueda;

    public function render()
    {
        $ventasDiarias = Venta::where("created_at",
            "like", "%" . $this->fecha . "%")
            ->paginate(10);

        return view('livewire.ventas.ventas-diarias')
            ->extends("layouts.main")
            ->section("content")
            ->with("ventas", $ventasDiarias);
    }
    public function mount(){
        $this->fecha = now()->format("yy-m-d");
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
