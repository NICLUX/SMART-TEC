@extends("layouts.tabla")
@section("contenido")
    <div class="container mt-2">
        <div class="card-header">
            <h3 class="card-title">SERVICIOS</h3>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <div class="card-body">
                <a class="btn btn-success btn-sm float-right"  href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i>
                    Agregar</a>
            </div>
            <div class="card-body">
                <a class="btn-sm btn-success  float-right"  href="{{route("servicios.index")}}">Cambiar Vista</a>
            </div>
        </div>
        <form method="get" class="float-left" style="float:left" action="{{route("servicios.buscar")}}">
            @csrf
            <div class="form-inline my-2 my-lg-0 float-right">
                <input class="form-control"
                       name="busqueda"
                       @if(isset($busqueda))
                       value="{{$busqueda}}"
                       @endif
                       type="search" placeholder="Buscar">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <!------------------------------------------------------------------------------------------------------>
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
                    No hay Servicios registrados aun
                </div>
        @endif
    </div>
  </section>
    </div>
@endsection
