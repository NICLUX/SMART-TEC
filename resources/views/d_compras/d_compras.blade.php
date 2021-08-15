@extends("layouts.main")
@section("content")
      <div>
            <div class="alert alert-link">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color:#1c2d3f">
                        <h2 style="color:#ffffff;">
                            COMPRAS
                            <a class="btn-sm btn-warning float-right" href="{{route("compras.index")}}"> Volver</a>
                        </h2>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="col-4">
                    <div class="alert alert-light">
                        <strong>Proveedor:</strong><p class="text-muted">
                        <p>{{$compra->nombre}}</p></p>
                            <br><hr><br>
                        <strong><i class="fa fa-calendar"></i> Fecha:</strong>
                        <p class="text-muted">{{\Carbon\Carbon::parse($compra->feche_hora)->locale("es")->isoFormat("DD MMMM, YYYY")}}</p>
                            <br><hr>
                        <strong><i class="fa fa-money"></i> Total:</strong>
                        <p class="text-muted"> <p>{{$compra->total}}</p></p>
                            <br><hr>
                    </div>
                 </div>

                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item active"> DETALLE </li>
                        @foreach($detalles as $det)
                            <li class="list-group-item">
                                <img class="float-left mr-2"
                                     width="100px"
                                     height="100px"
                                     src="/images/productos/{{$det->imagen_url}}"
                                     onerror="this.src='/images/no_image.jpg'">
                                <strong> {{$det->nombre}} </strong>
                                <br><strong>Precio de compra: </strong> L. {{$det->costo_compra}}
                                <br><strong>Unidades: </strong>{{$det->cantidad}}
                            <br><strong>Sub-total: </strong>{{$det->total}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
