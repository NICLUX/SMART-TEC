@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")
    <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
        <a class="btn btn-outline-success float-right" href="{{route("proveedor.nuevo")}}"><i class="fa fa-plus"></i>Agregar</a>
    </div>
    <br>
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
                <br>
                <div class="panel-body table-responsive">
                        @if($proveedores->count()>0)
                        <table class="table table-hover table-sm">
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
                                            <td>{{$proveedor->email}}</td>
                                        @else
                                            <td>n/a</td>
                                        @endif
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                               href="{{route("proveedor.editar",["id"=>$proveedor->id])}}"
                                               title="Editar"><i class="fa fa-pencil"></i> Editar</a>
                                            <button class="btn btn-sm btn-danger"
                                                    data-id="{{$proveedor->id}}"
                                                    data-toggle="modal" data-target="#modalBorrarApertura">
                                                <i class="fa fa-trash"></i> Borrar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminar proveedor</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Esta seguro que deseas borrar el proveedor?</p>
                                            </div>
                                            <form>
                                                <div class="modal-footer">
                                                    <input id="idApertura" name="id">
                                                    <a class="btn btn-danger"
                                                       href="{{route("proveedor.destroy",["id"=>$proveedor->id])}}"> Eliminar</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
