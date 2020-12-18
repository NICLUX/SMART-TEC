<div>
    <div class="card">
        <div class="card-header">
            <h4>Detalle de la venta</h4>
        </div>
        <div class="card-body">
            <div class="col-4">
                <div class="alert alert-light">
                    <strong>Nombre del cliente:</strong>
                    <p class="text-muted">{{$venta->cliente->nombre}}</p>
                    <br>
                    <hr>

                    <br>
                    <strong><i class="fa fa-calendar"></i> Fecha de Venta:</strong>
                    <p class="text-muted">{{\Carbon\Carbon::parse($venta->fecha)->locale("es")->isoFormat("DD MMMM YYYY")}}</p>


                    <br>
                    <hr>
                    <strong><i class="fa fa-money"></i> Total Venta:</strong>
                    <p class="text-muted">Lps. {{$venta->total_venta}}</p>
                    <br>
                    <hr>


                </div>
            </div>
            <div class="col">

                <ul class="list-group">
                    <li class="list-group-item active">Listado de ventas: </li>
                    @foreach($detalle_venta as $detalle)
                        <li class="list-group-item">
                            <img class="float-left mr-2"
                                 width="100px"
                                 height="100px"
                                 src="/images/productos/{{$detalle->producto->imagen_url}}"
                                 onerror="this.src='/images/no_image.jpg'">
                             <strong> {{$detalle->producto->nombre}} </strong> <br>Lps. {{$detalle->producto->costo_venta}} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
