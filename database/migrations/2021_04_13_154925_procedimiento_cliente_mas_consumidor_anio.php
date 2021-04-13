<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProcedimientoClienteMasConsumidorAnio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP procedure IF EXISTS cliente_mas_consumidor_anio");
        DB::unprepared("

        CREATE PROCEDURE `cliente_mas_consumidor_anio`(
            IN `pa_anio` DATE
        )
        BEGIN
        SELECT clientes.nombre, sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) AS `total`
                   FROM ventas, detalle_ventas, clientes
                   WHERE detalle_ventas.id_venta = ventas.id AND ventas.id_cliente = clientes.id
                           AND YEAR(ventas.fecha_venta) = YEAR(pa_anio)
                   GROUP BY clientes.nombre
                   ORDER BY sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) DESC 	
                    LIMIT	0,5;
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
