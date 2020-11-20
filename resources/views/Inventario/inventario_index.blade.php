@extends("layouts.main")
@section("content")
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Inventario</h3>
            </div>
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
                @if(session("error"))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <span class="fa fa-save"></span> {{session("error")}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                @endif


                <a class="btn btn-success btn-sm float-right" href="{{route("inventario.nuevo")}}"><i
                            class="fa fa-plus"></i>
                    Agregar</a>

                <br>
                <hr>
                @if($inventarios->count()>0)
                    <div class="table-responsive">
                        <table class="table table-hover
                        table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Cantidad (Stock)</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($inventarios as $item=> $inventario)
                                <tr>
                                    <td>
                                        {{$item+$inventarios->firstItem()}}
                                    </td>
                                    <td>{{$inventario->producto->nombre}}</td>
                                    <td>{{$inventario->cantidad}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                           href="{{route("inventario.editar",["id"=>$inventario->id])}}"
                                        title="Editar"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger"
                                        href="{{route("inventario.destroy",["id"=>$inventario->id])}}">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination pagination-sm">
                            {{$inventarios->links()}}
                        </div>
                    </div>
                    @else
                    <div class="alert alert-info">
                        No se ha creado el inventario aun
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection