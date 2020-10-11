@extends("layouts.main")

@section("content")

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Apertura de Caja</li>
            </ol>
        </nav>

        <hr>

        <button class="btn btn-sm btn-success "
                data-toggle="modal" data-target="#modalCrearApertura">Agregar
        </button>

        <br><br>
        @if(session("exito"))
            <div class="alert alert-success ">
                {{session("exito")}}
            </div>
        @endif
        @if($aperturas->count()>0)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Efectivo Inicial</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Hora y Fecha</th>
                    <th scope="col">Acciones</th>

                </tr>
                </thead>
                <tbody>

                @foreach($aperturas as $item => $apertura)
                    <tr>
                        <th scope="row">{{$item+$aperturas->firstItem()}}</th>
                        <td>{{$apertura->efectivo_inicial}}</td>
                        <td>{{$apertura->id_usuario}}</td>
                        <td>{{$apertura->created_at}}</td>
                        <td>
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-pencil"></i> Editar
                            </button>

                            <button class="btn btn-sm btn-danger"
                                    data-id="{{$apertura->id}}"
                                    data-toggle="modal" data-target="#modalBorrarApertura">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-sm">
                {{$aperturas->links()}}
            </div>
        @else
            <div class="alert alert-info">
                <h5><i class="fa fa-exclamation-triangle"></i> No hay aperturas de cajas registradas aun.</h5>
            </div>

        @endif


        <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Eliminar Apertura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Deseas borrar la apertura?</p>
                    </div>
                    <form>
                        <div class="modal-footer">

                            <input id="idApertura" name="id">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCrearApertura" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Apertura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route("apertura.crear")}}"
                          method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Ingrese el efectivo inicial:</label>
                                <input class="form-control"
                                       min="0"
                                       required
                                       name="efectivo_inicial" type="number">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection