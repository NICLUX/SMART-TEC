@extends('layouts.tabla')
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <h2 style="color:#ffffff;">
                    COMPRAS
                    <a class="btn-sm btn-success float-right" href="{{route("compras.nuevo")}}"><i
                            class="fa fa-plus"></i> Agregar</a>
                </h2>
            </li>
        </ul>
    </div>
@endsection
@section("contenido")
    @if($compras->count()>0)
        <table style="margin-top: 10px" class="table table-sm">
            <tr id="tabla" style="background-color: black; color: whitesmoke">
                <th scope="col">#</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Total (L.)</th>
                <th class="text-center">Acciones</th>
            </tr>
            @foreach($compras as $compra)
                <tr id="resultados">
                    <th scope="row">{{$compra->id}}</th>
                    <td scope="row">{{$compra->name}}</td>
                    <td scope="row">{{$compra->nombre}}</td>
                    <td scope="row">{{$compra->feche_hora}}</td>
                    <td scope="row">{{$compra->numero_comprobante}}</td>
                    <td scope="row">{{$compra->total}}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger"
                                data-id="{{$compra->id}}"
                                data-toggle="modal" data-target="#modalBorrarApertura">
                            <i class="fa fa-trash"></i></button>
                        <a class="btn btn-warning btn-sm"
                           href="{{route("compras.show",["id"=>$compra->id])}}">
                            <i class="fa-window-restore"></i></a>

                    </td>
                </tr>

                <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Eliminar la compra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Esta seguro que deseas borrar la compra?</p>
                            </div>
                            <form>
                                <div class="modal-footer">
                                    <input id="idApertura" name="id">
                                    <a class="btn btn-danger"
                                       href="{{route("compras.destroy",["id"=>$compra->id])}}"> Eliminar</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
            @endforeach
        </table>
    @else
        <div class="alert alert-info">
            <h5><i class="fa fa-exclamation-triangle"></i> No hay compras registradas aun.</h5>
        </div>
    @endif
    <div class="pagination pagination-sm justify-content-center">
        {{$compras->links("pagination::bootstrap-4")}}
    </div>
@endsection
