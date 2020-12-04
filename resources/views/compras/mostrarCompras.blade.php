@extends("layouts.main")
@section("content")
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" >Mostrar Compras</li>
            </ol>
        </nav>
        <hr>
        <a class="btn btn-success btn-sm float-right" href="{{route("compras.crear")}}"><i class="fa fa-plus"></i> Agregar</a>
        <br><br>
        @if(session("exito"))
            <div class="alert alert-success ">
             </div>
        @endif

        @if($detalle_compras->count()>0)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id usuario</th>
                    <th scope="col">Id proveedores</th>
                    <th scope="col">Total compras</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detalle_compras as $detalle_compra)
                    <tr>
                        <th scope="row">{{$detalle_compra->id}}</th>
                        <td>{{$detalle_compra->id}}</td>
                        <td>{{$detalle_compra->id_proveedor}}</td>
                        <td>{{$detalle_compra->cantidad * $detalle_compra->costo_compra}}</td>
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
        @else
            <div class="alert alert-info">
                <h5><i class="fa fa-exclamation-triangle"></i> No hay compras registradas aun.</h5>
            </div>
            @endif
                </tbody>
            </table>

            <script>
                @foreach($detalle_compras as $detalle_compra)
                <p>{{$detalle_compra->cantidad * $detalle_compra->costo_compra}}</p>
                @endforeach
            </script>

@endsection
