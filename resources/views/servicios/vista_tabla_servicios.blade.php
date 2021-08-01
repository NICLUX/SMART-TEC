@extends('layouts.tabla')
@section('buscar')

<div class="col">
    <ul class="list-group">
        <li class="list-group-item" style="background-color:#1c2d3f">
            <h2 style="color:#ffffff;">
                Tabla de Servicios
                <a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i>
                    Agregar</a>
                <a class="btn-sm btn-success float-right" style="margin-right:3px"
                    href="{{route("servicios.nuevaVista")}}"><i class="fa fas fa-clone"></i> Lista </a>
            </h2>
        </li>
    </ul>
</div>
@endsection
@section("contenido")
@if(count($servicios)>0)
<div class="table-responsive-sm -mr-2">
    <table class="table table-borderless table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-justify">#</th>
                <th scope="col" class="text-justify">Nombre</th>
                <th scope="col" class="text-justify">Descripcion</th>
                <th scope="col" class="text-justify">Costo</th>
                <th scope="col" class="text-justify">Categoría</th>
                <th scope="col" class="text-justify">Editar</th>
                <th scope="col" class="text-justify">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $item=> $servicio)
            <tr class="text-justify">
                <th scope="row">{{$servicio->id}}</th>
                <td>{{$servicio->nombre}}</td>
                @if($servicio->descripcion)
                <td>{{$servicio->descripcion}}</td>
                @else
                <td>n/a</td>
                @endif
                <td>{{$servicio->costo_de_venta}}</td>
                <td>{{$servicio ->id_categoria}}</td>
                <td>
                    <a class="btn-sm btn-success" href="{{route("servicios.editar",["id"=>$servicio->id])}}">
                        <i class="fa fa-pencil"></i></a>
                </td>
                <td>
                    <button class="btn-sm btn-danger"
                            data-id="{{$servicio->id}}"
                            data-toggle="modal" data-target="#modalBorrarApertura">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
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
        <div class="card-footer1 ">
            <div class="pagination pagination-sm justify-content-center">
                {{$servicios->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </table>
    @else
    <div class="alert alert-info">
        <h4>No hay servicios agregados aún, presiona el botón de agregar.</h4>
    </div>
    @endif

@endsection
