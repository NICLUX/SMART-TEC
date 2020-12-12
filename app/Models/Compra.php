<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table="compras";
    protected $primaryKey ="id";
    public $timestamps = false;
    protected $fillable =[
          'id_proveedor',
          'tipo_comprobante',
          'serie_comprobante',
          'numero_comprobante',
          'impuesto',
          'feche_hora',
          'estado',
    ];
    protected $guarded=[];

}
