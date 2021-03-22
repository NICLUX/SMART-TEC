<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=["nombre", "costo_compra","id_categoria", "costo_venta", "imagen_url", "descripcion"];
    protected $appends=["nombre_categoria","en_stock"];


    public function getNombreCategoriaAttribute(){
        $nombreCategoria = Categoria::where("id",$this->id_categoria)->value("nombre");
        return $nombreCategoria;
    }
    public  function getEnStockAttribute(){
        $inventario= Inventario::where("id_producto","=",$this->id)->value("cantidad");
        return $inventario;
    }

}
