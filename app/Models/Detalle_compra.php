<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    use HasFactory;
    protected $table="detalle_compras";
    protected $primaryKey ="id";
    public $timestamps = false;
    protected $fillable =[
        'id_compra',
        'id_producto',
        'precio_compra',
        'precio_venta',
        'cantidad',
    ];
    protected $guarded=[];

}
