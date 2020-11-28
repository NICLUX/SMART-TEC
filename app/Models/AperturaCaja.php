<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AperturaCaja extends Model
{
    use HasFactory;
    protected $fillable=["efectivo_inicial","id_usuario"];
    protected $appends=["nombre_usuario"];


    public function getNombreUsuarioAttribute(){
        $usuario = User::findOrFail($this->id_usuario)->value("usuario");
        return $usuario;
    }
}
