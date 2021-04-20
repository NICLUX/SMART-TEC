@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")
    <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
        <a class="btn btn-outline-success float-right" href="{{route("cliente.nuevo")}}"><i class="fa fa-plus"></i>Agregar</a>
    </div><br>
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
                            <span class="glyphicon glyphicon-list-alt"> </span>Clientes</h2>
                    </div>
                </div> <br>

                <div class="panel-body table-responsive">
                    <div class="card card-body">
                        <div class="container-fluid">
                            @if($clientes->count())
                                <table class="table">
                                    <thead class="table table-hover">
                                    <tr id="tabla">
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Télefono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientes as $item=>$cliente)
                                        <tr id="resultados">
                                            <th>{{$item+$clientes->firstItem()}}</th>
                                            <td>{{$cliente->nombre}}</td>
                                            <td>{{$cliente->telefono}}</td>
                                            <td>{{$cliente->direccion}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success"
                                                   href="{{route('cliente.editar',['id'=>$cliente->id])}}"
                                                   title="Editar"><i class="fa fa-pencil"> Editar</i></a>

                                                <batton class="btn btn-sm btn-danger"
                                                        data-id="{{$cliente->id}}"
                                                        data-toggle="modal" data-target="#modalBorrarApertura"
                                                        onclick= "recibir('{{$cliente->id}}')" >
                                                    <i class="fa fa-trash"></i> Borrar
                                                </batton>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination pagination-sm justify-content-center">
                                    {{$clientes->links()}}
                                </div>
                            @else
                                <div class="alert alert-info">
                                    No hay clientes ingresados aún.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Esta seguro que deseas borrar el cliente?</p>
                        </div>
                        <form name="formulario_eliminar" action="procesar.asp" method="POST" >
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
        </div>
    </div>


    <script>
        function recibir(numero){
            alert(numero);
            var id =  numero;
            document.formulario_eliminar.action="/cliente/"+id+"/destroy";
            alert(document.formulario_eliminar.action);
        }
    </script>

@endsection
