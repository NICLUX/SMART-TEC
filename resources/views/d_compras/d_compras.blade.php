@extends("layouts.main")
@section("content")
      <div>
        <div class="card">
            <div class="card-header">
                <a class="btn alert-primary float-right" href="{{route("compras.index")}}">
                    Cerrar</a>
                <h4>Detalle de la compra</h4>
            </div>
            <div class="card-body">
                <div class="col-4">
                    <div class="alert alert-light">
                        <strong>Nombre del proveedor:</strong>
                        <p class="text-muted"> <p>{{$compra->nombre}}</p></p>
                        <br>
                        <hr>
                        <br>
                        <strong><i class="fa fa-calendar"></i> Fecha de compra:</strong>
                        <p class="text-muted"> <p>{{$compra->feche_hora}}</p></p>
                        <br>
                        <hr>
                        <strong><i class="fa fa-money"></i> Total compra:</strong>
                        <p class="text-muted"> <p>{{$compra->total}}</p></p>
                        <br>
                        <hr>

                    </div>
                 </div>
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item active">Listado de compra: </li>
                        @foreach($detalles as $det)
                            <li class="list-group-item">
                                <img class="float-left mr-2"
                                     width="100px"
                                     height="100px"
                                     src="/images/productos/{{$det->imagen_url}}"
                                     onerror="this.src='/images/no_image.jpg'">
                                <strong> {{$det->nombre}} </strong>
                                <br>Costo de compra: Lps. {{$det->costo_compra}}
                                <br>Costo de venta: Lps. {{$det->costo_venta}}
                                <br> Cantidad: {{$det->cantidad}}
                                <br> sub_total: {{$det->total}} </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
