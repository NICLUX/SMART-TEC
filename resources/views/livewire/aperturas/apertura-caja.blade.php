<div xmlns:wire="http://www.w3.org/1999/xhtml">

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
        @if(session("error"))
            <div class="alert alert-danger ">
                <i class="fa fa-exclamation-triangle"></i> {{session("error")}}
            </div>
        @endif
        @if($aperturas->count()>0)
            <table class="table table-striped table-hover table-sm">
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

                @foreach($aperturas as $apertura)
                    <tr>
                        <th scope="row">{{$numeroPagina++}}</th>
                        <td>{{$apertura->efectivo_inicial}}</td>
                        <td>{{$apertura->nombre_usuario}}</td>
                        <td>{{$apertura->created_at}}</td>
                        <td>
                            <button class="btn btn-sm btn-success"
                                    wire:click="preEditar({{$apertura->id}})"
                                    data-toggle="modal" data-target="#modalEditarApertura">
                                <i class="fa fa-pencil"></i> Editar
                            </button>

                            <button class="btn btn-sm btn-danger"
                                    wire:click.prevent="predelete({{$apertura->id}})"
                                    data-toggle="modal" data-target="#modalBorrarApertura">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info">
                <h5><i class="fa fa-exclamation-triangle"></i> No hay aperturas de cajas registradas aun.</h5>
            </div>

        @endif


        <div class="modal fade" id="modalEditarApertura" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Apertura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group ">
                            <label for="efectivo_inicial">Efectivo inicial:</label>
                            <div class="input-group">
                                <input placeholder="Ingrese efectivo inicial"
                                       id="efectivo_inicial"
                                       wire:model="efectivo_inicial"
                                       required
                                       type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog" wire:ignore.self>
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
                            <form wire:submit.prevent="destroy()">
                                <button type="submit"
                                        wire:click.prevent="destroy()"
                                        class="btn btn-danger">Eliminar
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalCrearApertura" tabindex="-1" role="dialog" wire:ignore.self>
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
                                       wire:model="efectivo_inicial"
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
</div>