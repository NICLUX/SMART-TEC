<?php

namespace App\Http\Controllers;

use App\Models\AperturaCaja;
use Illuminate\Http\Request;

class AperturaCajaController extends Controller
{
    public function index()
    {
        $aperturas = AperturaCaja::paginate(10);

        return view("apertura_caja")->with("aperturas", $aperturas);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "efectivo_inicial" => "numeric|required"
        ]);

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

        return redirect()->route("apertura.index")->with("exito", "Se elimino exitosamente la apertura");

    }
}
