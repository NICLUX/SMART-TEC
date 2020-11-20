<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Utils;

class Inventario extends Model

{
    use HasFactory;

    protected $fillable=["id_producto","cantidad"];

    protected $appends=["producto"];

    public function getProductoAttribute(){
        $producto = Producto::findOrFail($this->id_producto);
        return $producto;
    }

}
