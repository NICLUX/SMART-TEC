<?php

namespace App\Http\Livewire;

use App\Models\AperturaCaja;
use Livewire\Component;
use Livewire\WithPagination;

class AperturaCajas extends Component
{
    use WithPagination;
    public $efectivo_inicial;
    public $aperturas;
    public $numeroPagina=1;
    public $idApertura;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.aperturas.apertura-caja')
            ->extends("layouts.main")
            ->section("content");
    }


    public function mount()
    {
        $this->aperturas = AperturaCaja::all();
    }

    public function predelete($id){
        $this->idApertura= $id;
    }
    public function destroy(){
        $apertura = AperturaCaja::findOrfail($this->idApertura);
        $apertura->delete();
        $this->emit("destroyApertura");
        session()->flash("exito","Se elimino correctamente la apertura");
        $this->mount();

    }

    public function crear()
    {
        $this->limpiar();
        $this->validate([
            "efectivo_inicial" => "numeric|required",
        ], [
            "efectivo_inicial.required" => "Se requiere que ingrese el efectivo inicial."
        ]);

        $existeAperturaActiva = \App\Models\AperturaCaja::where("activa", "=", true)->get();

        if ($existeAperturaActiva->count() > 0) {
            $this->emit("crearApertura");
            session()->flash("error", "No se puede crear la apertura porque ya existe una activa.");
        }
        $apertura = new AperturaCajas();
        $apertura->efectivo_inicial = $this->efectivo_inicial;
        $apertura->id_usuario = 1;
        $apertura->activa = true;
        $apertura->save();

        session()->flash("exito","Se creo correctamente la apertura");
        $this->emit("crearApertura");

    }
    public function preEditar($id){
        $this->limpiar();
        $this->idApertura= $id;
        $apertura = AperturaCaja::findOrFail($id);
        $this->efectivo_inicial= $apertura->efectivo_inicial;

    }
    public function limpiar(){
        $this->efectivo_inicial="";
    }
    public function update(){
        $this->validate([
            "efectivo_inicial" => "numeric|required",
        ], [
            "efectivo_inicial.required" => "Se requiere que ingrese el efectivo inicial."
        ]);

        $apertura= AperturaCaja::findOrFail($this->idApertura);
        $apertura->efectivo_inicial =$this->efectivo_inicial;
        $apertura->save();

        $this->emit("editarApertura");
        session()->flash("exito","Se edito exitosamente la apertura ");
        $this->mount();
    }
}
