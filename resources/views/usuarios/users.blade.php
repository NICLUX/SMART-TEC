@extends('layouts.main')
@section("content")

    <div class="card-body" class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <!---Alerta y envia mensajes al cliente cuando hay un error o se registran -->
        @if(session("exito"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session("exito")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col">
            <ul class="list-group">
                <li class="list-group-item" style="background-color:#1c2d3f">
                    <h2 style="color:#ffffff;">
                        USUARIOS
                        <a class="btn-sm btn-success float-right" href="{{route("usuarios.create")}}"><i
                                class="fa fa-plus"></i> Agregar</a>
                        <a class="btn-sm btn-success float-right" style="margin-right:3px"
                           href="{{route("usuarios.mostrar")}}"><i class="fa fas fa-clone"></i> Tabla </a>
                    </h2>
                </li>
            </ul>
        </div>

        <div class="col">
            <ul class="list-group">
                @foreach($users as $item => $user)
                    <li class="list-group-item">
                        <img class="float-left mr-2"
                             width="350px"
                             height="300px"
                             src="/images/user/{{$user->photo}}"
                             onerror="this.src='/images/no_image.jpg'">
                        <div>
                            <strong>{{$user->name}} </strong>
                            <br>
                            <hr>
                            <br> N°: {{$user->id}}
                            <br> Usuario: {{$user->usuario}}
                            <br> Tipo: {{$user->tipo_users}}
                            <br> Correo: {{$user->email}}
                            <br> Teléfono: {{$user->telefono}}
                            <br> <br>
                            <hr/>
                            <br>


                            <a class="btn-sm btn-success"
                               href="{{route("usuarios.editar",["id"=>$user->id])}}">
                                <i class="fa fa-pencil"></i> Editar</a>

                                @if (auth()->user()->is_admin != $user->is_admin)
                                <button class="btn-sm btn-danger"
                                    data-id="{{$user->id}}"
                                    data-toggle="modal" data-target="#modalBorrarApertura"
                                    onclick="recibir('{{$user->id}}')">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                            @endif


                @endforeach
            </ul>
        </div>

    </div>
    <div class="card-footer1 ">
        <div class="pagination pagination-sm justify-content-center">
            {{$users->links("pagination::bootstrap-4")}}
        </div>
    </div>

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
                <form name="formulario_eliminar" action="procesar.asp" method="POST">
                    <div class="modal-footer">
                        @csrf
                        @method('DELETE')
                        <input id="idApertura" name="id">
                        <input type="submit" class="btn btn-danger" value="Eliminar"> </input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                   </div>
                </form>
            </div>
        </div>

    </div>
    </li>
    <style>
        .card- {
            margin: 10px;
            margin-right: 10px;
            background: #1d2124;
            color: white;
        }

        .card-footer {
            margin-bottom: 10px;
            background: #527188;
            color: white;
        }

        .card-footer1 {
            margin-bottom: 10px;
            background: #dae0e3;
            color: white;

        }

        .card-group {
            margin-left: 12%;
        }

        a {
            margin: 10px;
        }
    </style>
    <script>
        function recibir(numero) {
            var id = numero;
            document.formulario_eliminar.action = "/usuarios/" + id + "/eliminar";
        }
    </script>
@endsection

