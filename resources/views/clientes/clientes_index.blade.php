@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Clientes</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route("cliente.nuevo")}}"><i class="fa fa-plus"></i>
                Agregar</a>
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
                    @if($clientes->count())
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Télefono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $item=>$cliente)
                            <tr>
                                <th>{{$item+$clientes->firstItem()}}</th>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                       href="{{route("cliente.editar",["id"=>$cliente->id])}}"
                                       title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger"
                                       href="{{route("cliente.destroy",["id"=>$cliente->id])}}"
                                       title="Eliminar"><i class="fa fa-trash"></i></a>
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
@endsection
