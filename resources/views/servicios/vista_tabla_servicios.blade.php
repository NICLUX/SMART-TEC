@extends('layouts.tabla')
@section('buscar')

    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <h2 style="color:#ffffff;">
                    Tabla de Servicios
                    <a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i
                            class="fa fa-plus"></i> Agregar</a>
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
                @foreach($servicios as $item=> $servicioo)
                    <tr class="text-justify">
                        <th scope="row">{{$servicioo->id}}</th>
                        <td>{{$servicioo->nombre}}</td>
                        @if($servicioo->descripcion)
                            <td>{{$servicioo->descripcion}}</td>
                        @else
                            <td>n/a</td>
                        @endif
                        <td>{{$servicioo->costo_de_venta}}</td>
                        <td>{{$servicioo ->id_categoria}}</td>
                        <td>
                            <a class="btn-sm btn-success"
                               href="{{route("servicios.editar",["id"=>$servicioo->id])}}">
                                <i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <a class="btn-sm btn-danger"
                               href="{{route("servicios.destroy",["id"=>$servicioo->id])}}">
                                <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">
                    <h4>No hay servicios agregados aún, presiona el botón de agregar.</h4>
                </div>
            @endif
            <div class="card-footer1 ">
                <div class="pagination pagination-sm justify-content-center">
                    {{$servicios->links("pagination::bootstrap-4")}}
                </div>
            </div>
@endsection
