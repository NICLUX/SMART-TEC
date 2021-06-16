@extends('layouts.tabla')
@section('buscar')
    CLIENTES <a class="btn-sm btn-success float-right" href="{{route("cliente.nuevo")}}"><i class="fa fa-plus"></i> Agregar</a>
@endsection
@section("contenido")
    @if($clientes->count())
        <div class="table-responsive-sm -mr-2">
            <table class="table table-borderless table-hover table-sm">
                <thead class="thead-dark">
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
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
                            <a class="btn-sm btn-success"
                               href="{{route('cliente.editar',['id'=>$cliente->id])}}"
                               title="Editar"><i class="fa fa-pencil"> Editar</i>
                            </a>
                        </td>
                        <td>
                            <batton class="btn-sm btn-danger"
                                    data-id="{{$cliente->id}}"
                                    data-toggle="modal" data-target="#modalBorrarApertura"
                                    onclick="recibir('{{$cliente->id}}')">
                                <i class="fa fa-trash"></i> Borrar
                            </batton>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">
                    No hay clientes ingresados aún.
                </div>
            @endif
            <div class="pagination pagination-sm justify-content-center">
                {{$clientes->links()}}
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
        </div>
        <script>
            function recibir(numero) {
                var id = numero;
                document.formulario_eliminar.action = "/cliente/" + id + "/destroy";
            }
        </script>
@endsection
