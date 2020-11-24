<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    use HasFactory;
    protected $fillable=["nombre", "costo_compra","id_proveedor", "cantidad","total_compra", "id_usuario","descripcion"];
}
