<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use HasFactory;
    protected $table="ventas";

    protected $appends=["detalle_venta","cliente","total_venta","usuario"];
    public function getDetalleVentaAttribute(){
        $detalle = DetalleVenta::where("id_venta","=",$this->id)->get();
        return $detalle;
    }
    public function getClienteAttribute(){
        $cliente = Cliente::findOrFail($this->id_cliente);
        return $cliente;
    }
    public function getTotalVentaAttribute(){
        $ventas=DB::table("detalle_ventas")
            ->select(DB::raw("sum(costo_venta * cantidad) as total_venta"))
            ->where("id_venta", "=", $this->id)
            ->value("total_venta");
        return $ventas;
    }
    public function getUsuarioAttribute(){
        $usuario = User::findOrFail($this->id_usuario);
        return $usuario;
    }
}
