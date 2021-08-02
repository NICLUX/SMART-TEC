@extends("layouts.tabla")
@section('buscar')
<div class="col">
    <ul class="list-group">
        <li class="list-group-item" style="background-color:#1c2d3f">
            <h2 style="color:#ffffff;">
                Servicios
                <a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i>
                    Agregar</a>
                <a class="btn-sm btn-success float-right" style="margin-right:3px"
                    href="{{route("servicios.index")}}"><i class="fa fas fa-clone"></i> Volver </a>
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
                <div class="card p-3">
                    <div class="card-body" >
                        <h5 class="card-title">{{$servicio->nombre}}</h5>
                        <p class="card-text"><i class="fa fa-codepen"></i> {{$servicio->id_categoria}}</p>
                        @if($servicio->descripcion)
                        <p class="card-text"><strong>Descripción:</strong> {{$servicio->descripcion}}</p>
                        @endif
                        <small class="text-muted"><strong>Valor:
                                Lps.</strong> {{$servicio->costo_de_venta}}</small>
                        <br>
                        <a class="btn btn-sm btn-success" href="{{route("servicios.editar",["id"=>$servicio->id])}}">
                            <i class="fa fa-pencil"></i></a>
                        <button class="btn-sm btn-danger"
                                data-id="{{$servicio->id}}"
                                data-toggle="modal" data-target="#modalBorrarApertura">
                            <i class="fa fa-trash"></i> borrar</button>
                    </div>
                </div>
            @endforeach
    </div>
    @else
    <div class="alert alert-info">
        <h4>No hay servicios agregados aún, presiona el botón de agregar.</h4>
    </div>
    @endif
    <!-- Modal -->
        <div class="modal fade"id="modalBorrarApertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Esta seguro que deseas borrar el servicio?</p>
                    </div>
                    <div class="modal-footer">
                        <input id="idApertura" name="id">
                        <a class="btn-sm btn-danger"
                           href="{{route("servicios.destroy",["id"=>$servicio->id])}}"> Eliminar</a>
                        <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
