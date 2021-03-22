<?php

namespace App\Http\Livewire;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentasDiarias extends Component
{
    use WithPagination;
    public $fecha;
    public $busqueda;
    public $ventasDiarias;
    public $total_ingreso_del_dia;
    public $total_costo_del_dia;
    public $total_ganacia_del_dia;
    public $cantidad_vendidos;

    public function mount(){
        $this->fecha = Carbon::now()->format("Y-m-d");
        $this->total_ingreso_del_dia = 0;
        $this->total_costo_del_dia = 0;
        $this->total_ganacia_del_dia = 0;
        $this->cantidad_vendidos = 0;
    }

    public function render()
    {
        $this->total_ingreso_del_dia = 0;
        $this->total_costo_del_dia = 0;
        $this->total_ganacia_del_dia = 0;
        $this->cantidad_vendidos = 0;
        $this->ventasDiarias = DB::select("call ventas_diarias(?)",[$this->fecha]);
        
        foreach($this->ventasDiarias as $value){
            $this->total_ingreso_del_dia+=$value->total;
            $this->total_costo_del_dia+=$value->costos;
        }
        
        $this->total_ganacia_del_dia = $this->total_ingreso_del_dia -  $this->total_costo_del_dia;

        return view('livewire.ventas.ventas-diarias')
            ->extends("layouts.main")
            ->section("content")
            ->with("ventas", $this->ventasDiarias);
    }
}