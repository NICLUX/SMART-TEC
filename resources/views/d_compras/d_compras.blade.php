@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle compras</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route("DetalleCompras.nuevo")}}"><i class="fa fa-plus"></i>
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
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Id proveedores</th>
                            <th scope="col">Costo de compra</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total_compra</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($detalle_compras as $detalle_compra)
                            <tr>
                                <th scope="row">{{$detalle_compra->id}}</th>
                                <td>{{$detalle_compra->nombre}}</td>
                                @if($detalle_compra->descripcion)
                                    <td>{{$detalle_compra->descripcion}}</td>
                                @else
                                    <td>n/a</td>
                                @endif
                                <td>{{$detalle_compra->id_proveedor}}</td>
                                <td>{{$detalle_compra->costo_compra}}</td>
                                <td>{{$detalle_compra->cantidad}}</td>
                                <td>{{$detalle_compra->total}}</td>
                                <td><a class="btn btn-sm btn-success"
                                       href="{{route("DetalleCompra.editar",["id"=>$detalle_compra->id])}}">
                                        <i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm"
                                       href="{{route("DetalleCompra.destroy",["id"=>$detalle_compra->id])}}">
                                        <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
