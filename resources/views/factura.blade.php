<title>Factura de venta N#<?php echo($id);?></title>

<div class="row" style="width: 100%;margin:10px; text-align:center;">
    <h4 style="margin:10px;font-style:oblique;"> Factura de venta N# {{$id}} </h4>
</div>


<div class="row">
    <div class="col">

        <div style="text-size:20px;margin-bottom:5px;"><b>Fecha:</b> {{$fecha_venta}}</div>
        <div style="text-size:20px;margin-bottom:5px;"><b>Cliente:</b> {{$cliente[0]->nombre}}     <b>Teléfono:</b> {{$cliente[0]->telefono}}</div>
        <div style="text-size:20px;margin-bottom:5px;"><b>Dirección:</b> {{$cliente[0]->direccion}}</div>
        <table style="width: 100% ;border: solid 2px;">
            <thead>
                <tr style="text-align: center;">
                    
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Productos</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Cantidad</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Precio Unidad</th>
                    <th style="padding: 2px;text-align: center; border: solid .5px;width:80px;">Total</th>
                   </tr>
            </thead>
            <tbody>
            
                @foreach($detalle_ventas as $detalle_venta)
                <tr>
                   
                   
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$detalle_venta->getProductoAttribute()->nombre}}</td>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$detalle_venta->cantidad}}</td>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$detalle_venta->costo_venta}}</td>
                     <td style="padding: 2px;text-align: right;border: solid .5px;width:100px">L. {{$detalle_venta->costo_venta * $detalle_venta->cantidad}}</td>

                </tr>
                
                @endforeach  
                <tr>
                   
                   
                     <td colspan="3" style="padding: 2px;text-align: center;border: solid .5px;width:100px">Total </td>
                     <td style="padding: 2px;text-align: right;border: solid .5px;width:100px"><strong>
                                <?php
                                $suma_b=0;
                                foreach ($detalle_ventas as $detalle_venta)
                                {
                                $suma_b+=$detalle_venta->costo_venta * $detalle_venta->cantidad;
                                }
                                
                                ?>L. {{$suma_b}} 
                            </strong>  
                        </td>

                </tr>          
            </tbody>
        </table>
<br>
        <div style="text-size:20px;margin-bottom:5px; align-items: center;"><b>Exija su factura </b></div>
       <br>
        <div style="text-size:20px;margin-bottom:5px; align-items: center;"><b>Vendedor: {{$vendedor}}</b></div>

    </div>

</div>