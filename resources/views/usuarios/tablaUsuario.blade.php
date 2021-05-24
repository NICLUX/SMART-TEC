@extends('layouts.tabla')
@section("contenido")
@section('buscar')
    USUARIOS<a class="btn-sm btn-secondary btn-sm float-right" href="{{route("usuarios.index")}}">Nueva Vista</a>
    <a class="btn-sm btn-success float-right" href="{{route("usuarios.create")}}"><i class="fa fa-plus"></i>Agregar</a>
@endsection
    @if(count($users)>0)
        <div class="table-responsive-sm -mr-2">
            <table class="table table-borderless table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Nombre Usuario</th>
                        <th scope="col" class="text-center">Tipo usuario</th>
                        <th scope="col" class="text-center">Correo</th>
                        <th scope="col" class="text-center">Telefono</th>
                        <th scope="col" class="text-center">Editar</th>
                        <th scope="col" class="text-center">Eliminar</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($users as $item=> $user)
                    <tr id="">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->usuario}}</td>
                        <td>{{$user ->is_admin}}</td>
                        <td>{{$user ->email}}</td>
                        <td>{{$user ->telefono}}</td>
                        <td>
                            <a class="btn-sm btn-success"
                               href="{{route("usuarios.editar",["id"=>$user->id])}}">
                                <i class="fa fa-pencil"></i> Editar</a>
                        </td>
                        <td>
                            <button class="btn-sm btn-danger"
                                    data-id="{{$user->id}}"
                                    data-toggle="modal" data-target="#modalBorrarApertura">
                                <i class="fa fa-trash"></i> Borrar
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
