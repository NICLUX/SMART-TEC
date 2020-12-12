<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->double("costo_compra");
            $table->double("cantidad");
            $table->string("descripcion")->nullable();
            $table->foreignId("id_usuarios")->references("id")->on("users");
            $table->foreignId("id_proveedor")->references("id")->on("proveedores");
            $table->foreignId("id_producto")->references("id")->on("productos");
            $table->foreignId("id_compra")->references("id")->on("compras");
            $table->double("descuento")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
