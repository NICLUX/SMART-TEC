@extends('layouts.tabla')
@section("contenido")
@section('buscar')

    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <h2 style="color:#ffffff;">
                    USUARIOS
                    <a class="btn-sm btn-success float-right" href="{{route("usuarios.create")}}"><i
                            class="fa fa-plus"></i> Agregar</a>
                    <a class="btn-sm btn-success float-right" style="margin-right:3px"
                       href="{{route("usuarios.index")}}"><i class="fa fas fa-clone"></i> Lista </a>
                </h2>
            </li>
        </ul>
    </div>

@endsection
@if(count($users)>0)
    <div class="table-responsive-sm -mr-2">
        <table class="table table-borderless table-hover table-sm">
            <thead>
            <tr style="background: #1C2D3F; color: #ffffff">
                <th scope="col" style="text-align: center">N°</th>
                <th scope="col" style="text-align: justify">Nombre</th>
                <th scope="col" style="text-align: justify">Usuario</th>
                <th scope="col" style="text-align: justify">Tipo</th>
                <th scope="col" style="text-align: justify">Correo Electrónico</th>
                <th scope="col" style="text-align: justify">Teléfono</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item=> $user)
                <tr id="">
                    <th style="font: caption; text-align: right">{{$user->id}}</th>
                    <td style="font: caption; text-align: justify">{{$user->name}}</td>
                    <td style="font: caption; text-align: justify">{{$user->usuario}}</td>
                    <td style="font: caption; text-align: justify">{{$user ->is_admin}}</td>
                    <td style="font: caption; text-align: justify">{{$user ->email}}</td>
                    <td style="font: caption; text-align: justify">{{$user ->telefono}}</td>
                    <td align="center">
                        <a class="btn-sm btn-success"

                           href="{{route("usuarios.editar",["id"=>$user->id])}}">
                            <i class="fa fa-pencil"></i></a>
                    </td>
                    <td align="center">
                        <button class="btn-sm btn-danger"

                                data-id="{{$user->id}}"
                                data-toggle="modal" data-target="#modalBorrarApertura">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@else
    <div class="alert alert-info">
        No se han registrado usuarios aún con esta fecha <strong>{{$fecha}}</strong>
    </div>
@endif
<div>
    <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que deseas borrar el usuario?</p>
                </div>
                <form>
                    <div class="modal-footer">
                        <input id="idApertura" name="id">
                        <a class="btn btn-danger"
                           href="{{route("usuarios.borrar",["id"=>$user->id])}}"> Eliminar</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer1 ">
        <div class="pagination pagination-sm justify-content-center">
            {{$users->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection
