<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ProcedimientoProductosMasVendidosMes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP procedure IF EXISTS productos_mas_vendidos_mes");
        DB::unprepared("
        
        CREATE PROCEDURE `productos_mas_vendidos_mes`(
            IN `pa_fecha` DATE
        )
        BEGIN
        SELECT productos.nombre,sum(detalle_ventas.cantidad) AS `total_cantidad`, sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) AS `total`
           FROM ventas, detalle_ventas, productos
           WHERE detalle_ventas.id_venta = ventas.id AND detalle_ventas.id_producto = productos.id
                   AND YEAR(ventas.fecha_venta) = YEAR(pa_fecha) AND MONTH(ventas.fecha_venta) = MONTH(pa_fecha)
           GROUP BY  productos.nombre
           ORDER BY sum(detalle_ventas.cantidad) DESC 	
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
