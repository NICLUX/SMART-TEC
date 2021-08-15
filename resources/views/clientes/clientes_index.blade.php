@extends('layouts.tabla')
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <form style="margin-top: 10px; " method="get" action="{{route('cliente.buscar')}}">
                    @csrf
                    <div class="form-inline my-2 my-lg-0 float-right">
                        <input class="form-control"
                               name="busqueda"
                               @if(isset($busqueda))
                               value="{{$busqueda}}"
                               @endif
                               type="search" placeholder="Buscar cliente">
                        <div style="margin-left: 3px;" class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <h2 style="color:#ffffff;">
                    CLIENTES
                    <a class="btn-sm btn-success float-right" style="margin-right: 10px; width: 38px; height: 38px" href="{{route("cliente.nuevo")}}"><i
                            class="fa fa-plus" style="margin: 0 auto; text-align: center"></i></a>
                </h2>
            </li>
        </ul>
    </div>
@endsection
@section("contenido")
    <style>
        #tabla_prove tr:hover {
            background-color: gainsboro;
        }
    </style>

    @if($clientes->count())
        <div class="table-responsive-sm -mr-2">
            <table name="tabla_prove" class="table">
                <thead style="background: #1C2D3F; color: #ffffff">
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Opciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($clientes as $item=>$cliente)
                    <tr id="resultados">
                        <th style="font: caption; font-style: normal">{{$item+$clientes->firstItem()}}</th>
                        <td style="font: caption; font-style: normal">{{$cliente->nombre}}</td>
                        <td style="font: caption; font-style: normal">{{$cliente->telefono}}</td>
                        <td style="font: caption; text-align: justify">{{$cliente->direccion}}</td>
                        <td>
                            <a class="btn-sm btn-success" href="{{route("cliente.editar",["id"=>$cliente->id])}}"
                               title="Editar"><i class="fa fa-pencil"></i></a>

                            <button class="btn-sm btn-danger" data-id="{{$cliente->id}}" data-toggle="modal"
                                    data-target="#modalBorrarApertura"
                                    onclick="recibir('{{$cliente->id}}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <!-- Modal -->
                <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Esta seguro que deseas borrar el cliente?</p>
                            </div>
                            <form name="formulario_eliminar" action="" method="POST">
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
            </table>
            @else
                <div class="alert alert-info">
                    <h4>No hay clientes agregados aún, presiona el botón de agregar.</h4>
                </div>
            @endif

            <div class="col-md-5" style="text-align: center; margin: 0 auto; margin-bottom: 10px; margin-top: 12px;">
                {{ $clientes->links('pagination::bootstrap-4') }}
            </div>

            <script>
                function recibir(numero) {
                    var id = numero;
                    document.formulario_eliminar.action = "/cliente/" + id + "/destroy";
                }
            </script>
@endsection
