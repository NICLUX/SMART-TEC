<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentasAnuales extends Component
{
    use WithPagination;
    public $enero;
    public $febrero;
    public $marzo;
    public $abril;
    public $mayo;
    public $junio;
    public $julio;
    public $agosto;
    public $septiembre;
    public $octubre;
    public $noviembre;
    public $diciembre;

    public $anio;
    public $fecha;
    public $busqueda;
    public $ventasDiarias;
    public $total_ingreso_del_anio;
    public $total_costo_del_anio;
    public $total_ganacia_del_anio;
    public $cantidad_vendidos;
    public $fecha_mes_num;
    public $productos_mas_vendidos_anio;
    public $clientes_mas_consumidores;

    public function mount(){
        setlocale(LC_TIME, "spanish");
        $this->fecha = Carbon::now()->format("Y-m-d");
        
        $this->anio = Carbon::now()->format("Y");

        $this->fecha_mes_num = Carbon::now()->format("m");

         $this->enero = 0;
         $this->febrero = 0;
         $this->marzo = 0;
         $this->abril = 0;
         $this->mayo = 0;
         $this->junio = 0;
         $this->julio = 0;
         $this->agosto = 0;
         $this->septiembre = 0;
         $this->octubre = 0;
         $this->noviembre = 0;
         $this->diciembre = 0;

        $this->total_ingreso_del_anio = 0;
        $this->total_costo_del_anio = 0;
        $this->total_ganacia_del_anio = 0;
        $this->cantidad_vendidos = 0;
    }

    public function render()
    {
        $this->fechasss =  new \DateTime($this->fecha);
        $this->anio =  $this->fechasss->format("Y");

        $this->fecha_mes_num =  $this->fechasss->format("m");

        $this->total_ingreso_del_anio = 0;
        $this->total_costo_del_anio = 0;
        $this->total_ganacia_del_anio = 0;
        $this->cantidad_vendidos = 0;
        $this->ventasDiarias = DB::select("call ventas_anuales(?)",[$this->fecha]);
        
        $this->productos_mas_vendidos_anio = DB::select("call productos_mas_vendidos_anio(?)",[$this->fecha]);
        
        $this->clientes_mas_consumidores = DB::select("call cliente_mas_consumidor_anio(?)",[$this->fecha]);
        
        foreach($this->ventasDiarias as $value){
            $this->total_ingreso_del_anio+=$value->total;
            $this->total_costo_del_anio+=$value->costos;
        }

        
        $this->enero= DB::select("call ingreso_por_mes(?)",[$this->anio.'-01-01'])[0]->total;
        $this->febrero= DB::select("call ingreso_por_mes(?)",[$this->anio.'-02-01'])[0]->total;
        $this->marzo= DB::select("call ingreso_por_mes(?)",[$this->anio.'-03-01'])[0]->total;
        $this->abril= DB::select("call ingreso_por_mes(?)",[$this->anio.'-04-01'])[0]->total;
        $this->mayo= DB::select("call ingreso_por_mes(?)",[$this->anio.'-05-01'])[0]->total;
        $this->junio= DB::select("call ingreso_por_mes(?)",[$this->anio.'-06-01'])[0]->total;
        $this->julio= DB::select("call ingreso_por_mes(?)",[$this->anio.'-07-01'])[0]->total;
        $this->agosto= DB::select("call ingreso_por_mes(?)",[$this->anio.'-08-01'])[0]->total;
        $this->septiembre= DB::select("call ingreso_por_mes(?)",[$this->anio.'-09-01'])[0]->total;
        $this->octubre= DB::select("call ingreso_por_mes(?)",[$this->anio.'-10-01'])[0]->total;
        $this->noviembre= DB::select("call ingreso_por_mes(?)",[$this->anio.'-11-01'])[0]->total;
        $this->diciembre= DB::select("call ingreso_por_mes(?)",[$this->anio.'-12-01'])[0]->total;

        $this->total_ganacia_del_anio = $this->total_ingreso_del_anio -  $this->total_costo_del_anio;
         return view('livewire.ventas.ventas-anuales')
         ->extends("layouts.main")
         ->section("content")
         ->with("ventas", $this->ventasDiarias)
         ->withProductos_mas_vendidos_anio($this->productos_mas_vendidos_anio);
    }
}