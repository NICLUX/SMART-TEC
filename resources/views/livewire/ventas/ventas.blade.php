<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card">
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item" style="background-color:#1c2d3f">
                    <h2 style="color:#ffffff;">
                        VENTAS
                        <a class="btn-sm btn-success float-right" href="{{route("venta.nuevo")}}"><i
                                class="fa fa-plus"></i> Agregar</a>
                    </h2>
                </li>
            </ul>
        </div>

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
        @if ($errors->isNotEmpty())
            <div class="alert alert-danger alert-dismissible ">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <br>
            <br>

            @if($ventas->count()>0)
                <div class="table-responsive-sm">
                    <table class="table table-borderless table-hover table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Total de Venta</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ventas as $item=> $venta)
                            <tr>
                                <th>{{$item+$ventas->firstItem()}}</th>
                                <td>{{$venta->cliente->nombre}}</td>
                                <td>{{\Carbon\Carbon::parse($venta->fecha)->locale("es")->isoFormat("DD MMMM, YYYY")}}
                                </td>
                                <td>{{$venta->usuario->usuario}}</td>
                                @if($venta->total_venta)
                                    <td>L. {{$venta->total_venta}}</td>
                                @else
                                    <td>L. 0.00</td>
                                @endif
                                <td>
                                    <a href="{{route("venta.detalle",["id"=>$venta->id])}}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fa fa-info-circle"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm"
                                            data-toggle="modal" data-target="#modalCrear_{{$item}}"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                    </button>

                                <!-- <a href='{{route("venta.imprimir_factura",["id"=>$venta->id])}}' class="btn btn-sm btn-warning">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                    </a> -->

                                </td>
                            </tr>

                            <div wire:ignore class="modal fade" id="modalCrear_{{$item}}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea eliminar esta venta?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col" align="center"><a id="btnCancel"
                                                                                   class="btn btn-primary btn-round"
                                                                                   data-dismiss="modal">Cancelar</a>
                                                </div>
                                                <div class="col" align="center">
                                                    <a id="btnCancel"
                                                       wire:click.prevent="eliminarVenta({{$venta->id}})"
                                                       class="btn btn-success"
                                                       data-dismiss="modal"><i class="fa fa-trash"></i>
                                                        Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm">
                        {{$ventas->links("paginate-links")}}
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    No se han registrado ventas aún
                </div>
            @endif
        </div>
    </div>
</div>
