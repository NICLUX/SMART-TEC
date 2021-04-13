<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class IngresoPorMes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP procedure IF EXISTS ingreso_por_mes");
        DB::unprepared("

        CREATE PROCEDURE `ingreso_por_mes`(
            IN `pa_anio` DATETIME
        )
        BEGIN
                SELECT sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) AS `total`
                   FROM ventas, detalle_ventas
                   WHERE detalle_ventas.id_venta = ventas.id
                           AND YEAR(ventas.fecha_venta) = YEAR(pa_anio) AND MONTH(ventas.fecha_venta) = Month(pa_anio);
        END
        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
