@extends('layouts.main')
@section("content")
    <div>
        <div class="card-header">
            <h3 class="card-title">Mostrar Usuarios</h3>
        </div>
        <a class="btn btn-success btn-sm float-right" href="{{route("usuarios.create")}}"><i class="fa fa-plus"></i> Agregar</a>
        <div class="card-body">
            <!---Alerta y envia mensajes al cliente cuando hay un error o se registran -->
            @if(session("exito"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session("exito")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <hr>
            <br><br>
            <div class="card-group ">
                @foreach($users as $item => $user)

                    <div class="card- col-sm-5 ">

                        <div class="card-body">
                            <h4 >Usuario: {{$user->id}}</h4>
                            <button class="flex text-sm
                        "  width="50%"
                                    style=" margin-left: 5%; opacity: 0.8"   style="margin-left: 5%; opacity: 0.8"
                                    height="20%">
                                <img src="/images/categorias/{{$user->photo}}"
                                     onclick="$('#callModalVistaPrevia{{$user->id}}').click()"
                                     width="150px" height="150px" style="object-fit: contain"
                                     onerror="this.src='/images/no_user.png'"></td>
                            </button>

                            <h6 class="container">Nombre: {{$user->name}}</h6>
                            <h6 class="container">Correo: {{$user->email}}</h6>


                            <div >
                                <a class="btn btn-sm btn-success"
                                   href="{{route("usuarios.editar",["id"=>$user->id])}}">
                                    <i class="fa fa-pencil"></i>Editar</a>
                                <a class="btn btn-danger btn-sm float-right"
                                   href="{{route("usuarios.destroy",["id"=>$user->id])}}"
                                   title="Eliminar">
                                    <i class="fa fa-trash"></i>Eliminar</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="card-footer1 ">
                <div class="pagination pagination-sm justify-content-center">
                    {{$users->links("pagination::bootstrap-4")}}
                </div>
            </div>
            <style>

                .card-{
                    margin: 10px;
                    margin-right: 10px;
                    background: #1d2124;
                    color: white;
                }
                .card-footer{
                    margin-bottom: 10px;
                    background: #527188;
                    color: white;
                }
                .card-footer1{
                    margin-bottom: 10px;
                    background: #dae0e3;
                    color: white;

                }
                .card-group{
                    margin-left: 12%;
                }
                a {
                    margin: 10px;
                }
            </style>
@endsection

