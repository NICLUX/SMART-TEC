@extends("layouts.tabla")
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <h2 style="color:#ffffff;">
                    Tabla de servicios
                    <a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i
                            class="fa fa-plus"></i> Agregar</a>
                    <a class="btn-sm btn-success float-right" style="margin-right:3px"
                       href="{{route("servicios.index")}}"><i class="fa fas fa-clone"></i> Lista </a>
                </h2>
            </li>
        </ul>
    </div>
@endsection
@section("contenido")
    <section>
        @if($servicios->count()>0)
            <div class="card-columns">
                @foreach($servicios as $servicio)
                    <div class="card estilo-a">
                        <div class="card-body" style="width: 18rem;">
                            <h5 class="card-title">{{$servicio->nombre}}</h5>
                            <p class="card-text"><i class="fa fa-codepen"></i> {{$servicio->id_categoria}}</p>
                            @if($servicio->descripcion)
                                <p class="card-text"><strong>Descripcion:</strong> {{$servicio->descripcion}}</p>
                            @endif
                            <small class="text-muted"><i class="fa fa-dollar"></i> <strong>Valor:
                                    Lps.</strong> {{$servicio->costo_venta}}</small>
                            <br>
                            <a class="btn btn-sm btn-success"
                               href="{{route("servicios.editar",["id"=>$servicio->id])}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-sm"
                               href="{{route("servicios.destroy",["id"=>$servicio->id])}}">
                                <i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <h4>No hay servicios agregados aún, presiona el botón de agregar.</h4>
            </div>
        @endif
    </section>
@endsection
