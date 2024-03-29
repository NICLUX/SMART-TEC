<title>Reporte de Productos - <?php echo(now());?></title>

<div class="row" style="width: 100%;margin:10px; text-align:center;">
    <h1 style="margin:10px;font-style:oblique;">Catalogo de Productos Actuales</h1>
    <br>
    <h2 style="margin:10px;font-style:oblique;">SMARTEC</h2>
    <h3 style="margin:10px;font-style:oblique;">Arte y Tecnologia Inteligente</h3>
</div>
<br>

<div class="row">
    <div class="col">
        <table style="width: 100% ;border: solid 2px;">
            <thead>
                <tr style="text-align: center;">
                    
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Id</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:100px">Producto</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Descripción</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Categoria</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Precio Costo</th>
                    <th style="padding: 2px;text-align: center;border: solid .5px;width:150px">Precio Venta</th>

                   </tr>
            </thead>
            <tbody>
            
                @foreach($productos as $producto)
                <tr>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$producto->id}}</td>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$producto->nombre}}</td>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$producto->descripcion}}</td>
                     <td style="padding: 2px;text-align: center;border: solid .5px;width:100px">{{$producto->getNombreCategoriaAttribute()}}</td>
                     <td style="padding: 2px;text-align: right;border: solid .5px;width:100px">L. {{$producto->costo_compra}}</td>
                     <td style="padding: 2px;text-align: right;border: solid .5px;width:100px">L. {{$producto->costo_venta}}</td>

                </tr>
                
                @endforeach       
            </tbody>
        </table>
        <br>
        <div style="text-size:20px;margin-bottom:5px; align-items: center;"><b>Informe Confidencial</b></div>
        <br>
        <div style="text-size:20px;margin-bottom:5px; align-items: center;"><b>Usuario: {{Auth::user()->name}}</b></div>

    </div>

</div>