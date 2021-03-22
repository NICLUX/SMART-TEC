<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProcedimientoClientesMasConsumidores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP procedure IF EXISTS clientes_mas_consumidores");
        DB::unprepared("
        
        CREATE PROCEDURE `clientes_mas_consumidores`(
            IN `pa_fecha` DATE
        )
        BEGIN
        SELECT clientes.nombre, sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) AS `total`
           FROM ventas, detalle_ventas, clientes
           WHERE detalle_ventas.id_venta = ventas.id AND ventas.id_cliente = clientes.id
                   AND YEAR(ventas.fecha_venta) = YEAR(pa_fecha) AND MONTH(ventas.fecha_venta) = MONTH(pa_fecha)
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
