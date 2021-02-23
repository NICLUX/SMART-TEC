@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")
    <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
        <a class="btn btn-secondary float-right" href="{{route("proveedores.index")}}">Vista Tarjetas</a>
        <a class="btn btn-secondary float-right" href="{{route("proveedor.nuevo")}}">Agregar</a>
    </div>
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
    <div class="container-fluid" >
        <div class="panel panel-success" id="encabezado">
            <div class="panel-heading">
                <div class="row" id="color_panel">
                    <div class="col-xs-12 col-sm-12 col-md-3" >
                        <h2 class="text-center pull-left" style="padding-left: 30px;">
                            <span class="glyphicon glyphicon-list-alt"> </span>Proveedores</h2>
                    </div>
                </div>
            <div class="card card-body">
                <div class="container-fluid">
                    @if($proveedores->count()>0)
                        <table class="table">
                            <thead class="table table-hover">
                            <tr id="tabla">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Télefono</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proveedores as $item=> $proveedor)

                            <tr id="resultados">
                                <th scope="col">{{$item+$proveedores->firstItem()}}</th>
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$proveedor->direccion}}</td>
                                <td>{{$proveedor->telefono}}</td>
                                @if($proveedor->descripcion)
                                <td>{{$proveedor->descripcion}}</td>
                                @else
                                    <td>n/a</td>
                                @endif
                                @if($proveedor->descripcion)
                                <td>{{$proveedor->correo}}</td>
                                @else
                                    <td>n/a</td>
                                @endif
                                <td>
                                    <a class="btn btn-sm btn-success"
                                       href="{{route("proveedor.editar",["id"=>$proveedor->id])}}"
                                       title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger"
                                       href="{{route("proveedor.destroy",["id"=>$proveedor->id])}}"
                                       title="Eliminar"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm justify-content-center">
                        {{$proveedores->links()}}
                    </div>
                    @else
                        <div class="alert alert-info">
                            <h4>No hay proveedores agregador aún, presiona el botón de agregar.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
