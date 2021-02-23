<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Compra extends Model
{
    use HasFactory;
    protected $table="compras";
    protected $primaryKey ="id";
    public $timestamps = false;

    protected $fillable =[
        'id_proveedor',
        'id_usuario',
        'numero_comprobante',
        'impuesto',
        'feche_hora',
    ];

    protected $guarded=[];
    use HasFactory;
}
