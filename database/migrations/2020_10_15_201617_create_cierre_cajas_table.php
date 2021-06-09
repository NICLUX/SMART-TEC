<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCierreCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cierre_cajas', function (Blueprint $table) {
            $table->id();
            $table->double('id_apertura');
            $table->boolean('activa');
            $table->foreignId("efecivo_final")->references("id")->on("apertura_cajas");
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
        Schema::dropIfExists('cierre_cajas');
    }
}
