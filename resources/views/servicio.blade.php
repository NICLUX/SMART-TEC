@extends('layouts.main')
@section("content")

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Servicios</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i> Agregar</a>
            <br>

            <hr>

        <!---Alerta y envia mensajes al cliente cuando hay un error o se registran -->
        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session("exito")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session("error"))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <span class="fa fa-save"></span> {{session("error")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif

            <div class="card card-body">
                <div class="container-fluid">
                    @if($servicios->count()>0)
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($servicios as $item=> $servicio)

                                <tr>
                                    <th scope="row">{{$servicio->id}}</th>
                                    <td>{{$servicio->nombre}}</td>
                                    @if($servicio->descripcion)
                                        <td>{{$servicio->descripcion}}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                    <td>{{$servicio->costo_venta}}</td>
                                    <td>{{$servicio ->id_categoria}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                           href="{{route("servicios.editar",["id"=>$servicio->id])}}">
                                            <i class="fa fa-pencil"></i></a>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{route("servicios.destroy",["id"=>$servicio->id])}}">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination pagination-sm justify-content-center">
                            {{$servicios->links()}}
                        </div>
                    @else
                        <div class="alert alert-info">
                            <h4>No hay servicios registrados aún, presiona el botón de agregar.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
