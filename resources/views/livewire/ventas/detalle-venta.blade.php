<div>
    <div class="card">
        <div class="alert alert-link">
            <ul class="list-group">
                <li class="list-group-item" style="background-color:#1c2d3f">
                    <h2 style="color:#ffffff;">
                        VENTAS
                        <a class="btn-sm btn-warning float-right" href="{{route("ventas.index")}}"> Volver</a>
                    </h2>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="col-4">
                <div class="alert alert-light">
                    <strong> Cliente:</strong>
                    <p class="text-muted">{{$venta->cliente->nombre}}</p>
                        <br><hr><br>
                    <strong><i class="fa fa-calendar"></i> Fecha:</strong>
                    <p class="text-muted">{{\Carbon\Carbon::parse($venta->fecha)->locale("es")->isoFormat("DD MMMM YYYY")}}</p>
                        <br><hr>
                    <strong><i class="fa fa-money"></i> Total:</strong>
                    <p class="text-muted">L. {{$venta->total_venta}}</p>
                        <br><hr>
                </div>
            </div>

            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item active"> DETALLE </li>
                    @foreach($detalle_venta as $detalle)
                        <li class="list-group-item">
                            <img class="float-left mr-2"
                                 width="100px"
                                 height="100px"
                                 src="/images/productos/{{$detalle->producto->imagen_url}}"
                                 onerror="this.src='/images/no_image.jpg'">
                            <strong> {{$detalle->producto->nombre}} </strong>
                            <br><strong>Unidades: </strong>{{$detalle->cantidad}}
                            <br><strong>Precio de Venta: </strong> L. {{$detalle->costo_venta}} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
