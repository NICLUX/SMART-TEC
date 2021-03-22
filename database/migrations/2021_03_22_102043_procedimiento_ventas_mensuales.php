<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProcedimientoVentasMensuales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP procedure IF EXISTS ventas_mensuales");
        DB::unprepared("
        
        CREATE  PROCEDURE `ventas_mensuales`(
            `pa_fecha` DATE
        )
        BEGIN
        SELECT ventas.id, clientes.nombre, sum(detalle_ventas.costo_venta*detalle_ventas.cantidad) AS `total`,
                              sum(detalle_ventas.costo_compra*detalle_ventas.cantidad) AS `costos` 
           FROM ventas, detalle_ventas, clientes
           WHERE detalle_ventas.id_venta = ventas.id AND ventas.id_cliente = clientes.id
                   AND YEAR(ventas.fecha_venta) = YEAR(pa_fecha) AND MONTH(ventas.fecha_venta) = MONTH(pa_fecha)
           GROUP BY ventas.id, clientes.nombre;
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
        
    }
}
