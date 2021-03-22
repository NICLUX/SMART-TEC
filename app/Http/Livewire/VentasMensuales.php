<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentasMensuales extends Component
{
    use WithPagination;
    public $fecha_anio;
    public $fecha_mes;
    public $fecha;
    public $busqueda;
    public $ventasDiarias;
    public $total_ingreso_del_dia;
    public $total_costo_del_dia;
    public $total_ganacia_del_dia;
    public $cantidad_vendidos;
    public $fecha_mes_num;
    public $productos_mas_vendidos_mes;
    public $clientes_mas_consumidores;

    public function mount(){
        setlocale(LC_TIME, "spanish");
        $this->fecha = Carbon::now()->format("Y-m-d");
        
        $this->fecha_anio = Carbon::now()->format("Y");

        $Nueva_Fecha = date("d-m-Y", strtotime(Carbon::now()));				

        $this->fecha_mes = strftime("%B", strtotime($Nueva_Fecha));
        $this->fecha_mes_num = Carbon::now()->format("m");
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
        $this->ventasDiarias = DB::select("call ventas_mensuales(?)",[$this->fecha]);
        
        $this->productos_mas_vendidos_mes = DB::select("call productos_mas_vendidos_mes(?)",[$this->fecha]);
        
        $this->clientes_mas_consumidores = DB::select("call clientes_mas_consumidores(?)",[$this->fecha]);
        
        foreach($this->ventasDiarias as $value){
            $this->total_ingreso_del_dia+=$value->total;
            $this->total_costo_del_dia+=$value->costos;
        }
        
        $this->total_ganacia_del_dia = $this->total_ingreso_del_dia -  $this->total_costo_del_dia;

        return view('livewire.ventas.ventas-mensuales')
        ->extends("layouts.main")
        ->section("content")
        ->with("ventas", $this->ventasDiarias)
        ->withProductos_mas_vendidos_mes($this->productos_mas_vendidos_mes);
    }
}
