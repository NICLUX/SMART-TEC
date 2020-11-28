<?php

namespace App\Http\Controllers;

use App\Models\AperturaCaja;
use Illuminate\Http\Request;

class AperturaCajaController extends Controller
{
    public function index()
    {
        $aperturas = AperturaCaja::paginate(10);

        return view("apertura.apertura_caja")->with("aperturas", $aperturas);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "efectivo_inicial" => "numeric|required"
        ]);

        $existeAperturaActiva = AperturaCaja::where("activa", "=",true)->get();

        if ($existeAperturaActiva->count()>0){
            return redirect()->route("apertura.index")->with("error", "No se puede crear la apertura porque ya existe una activa.");

        }
        $apertura = new AperturaCaja();
        $apertura->efectivo_inicial =
            $request->input("efectivo_inicial");
        $apertura->id_usuario = 1;
        $apertura->activa = true;
        $apertura->save();

        return redirect()->route("apertura.index")->with("exito", "Se creo exitosamente la apertura");

    }

    public function destroy($id)
    {
        $apertura = AperturaCaja::findOrfail($id);
        $apertura->delete();

    }
}
