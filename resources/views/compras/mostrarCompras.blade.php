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
        <table class="table table-sm">
            <thead style="background: #1C2D3F; color: #ffffff">
            <tr id="tabla" style="background-color:#1c2d3f; border-radius: 10px; color: white">
                <th scope="col">N°</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Fecha</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Total</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            @foreach($compras as $compra)
                <tr id="resultados">
                    <th scope="row">{{$compra->id}}</th>
                    <td scope="row">{{$compra->name}}</td>
                    <td scope="row">{{$compra->nombre}}</td>
                    <td scope="row">{{\Carbon\Carbon::parse($compra->feche_hora)->locale("es")->isoFormat("DD MMMM, YYYY")}}</td>
                    <td scope="row">{{$compra->numero_comprobante}}</td>
                    <td scope="row">{{$compra->total}}</td>
                    <td class="text-center">
                        <button class="btn-sm btn-danger" data-id="{{$compra->id}}" data-toggle="modal"
                                data-target="#modalBorrarApertura"
                                onclick="recibir('{{$compra->id}}')">
                            <i class="fa fa-trash"></i>
                        </button>

                        <a href="{{route("compras.show",["id"=>$compra->id])}}"
                           class="btn btn-sm btn-warning">
                            <i class="fa fa-info-circle"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-info">
            <h5><i class="fa fa-exclamation-triangle"></i> No hay compras registradas aun.</h5>
        </div>
    @endif

    <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar proveedor</h5>
                    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que deseas borrar el proveedor?</p>
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

    <div class="pagination pagination-sm justify-content-center">
        {{$compras->links("pagination::bootstrap-4")}}
    </div>
    <script>
        function recibir(numero) {
            var id = numero;
            document.formulario_eliminar.action = "/compras/" + id + "/destroy";
        }
    </script>
@endsection
