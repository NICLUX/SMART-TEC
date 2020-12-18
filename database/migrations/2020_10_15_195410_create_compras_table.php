<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_proveedores")->references("id")->on("proveedors");
            $table->foreignId("id_usuario")->references("id")->on("users");
            $table->foreignId("id_producto")->references("id")->on("productos");
            $table->date("fecha_compra")->nullable();
            $table->double("impuesto");
            $table->double("total_compra");
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
        Schema::dropIfExists('compras');
    }
}
