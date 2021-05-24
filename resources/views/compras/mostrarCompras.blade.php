@extends('layouts.tabla')
@section('buscar')
    COMPRAS<a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i>Agregar</a>
@endsection
@section("contenido")
    @if($compras->count()>0)
        <table style="margin-top: 10px" class="table table-sm">
            <thead class="table table-hover">
            <tr id="tabla" style="background-color: black; color: whitesmoke">
                <th scope="col">#</th>
                <th scope="col">Vendedor</th>
                <th scope="col">proveedor</th>
                <th scope="col">Fecha Hora</th>
                <th scope="col">numero comptobante</th>
                <th scope="col">Total compra</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody class="table table-hover">
            @foreach($compras as $compra)
                <tr id="resultados">
                    <th scope="row">{{$compra->id}}</th>
                    <td>{{$compra->name}}</td>
                    <td>{{$compra->nombre}}</td>
                    <td>{{$compra->feche_hora}}</td>
                    <td>{{$compra->numero_comprobante}}</td>
                    <td>{{$compra->total}}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger"
                                data-id="{{$compra->id}}"
                                data-toggle="modal" data-target="#modalBorrarApertura">
                            <i class="fa fa-trash"></i> Borrar
                        </button>
                        <a class="btn btn-warning btn-sm"
                           href="{{route("compras.show",["id"=>$compra->id])}}">
                            <i class="fa-window-restore"></i>Mostrar</a>

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
            </tbody>
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
