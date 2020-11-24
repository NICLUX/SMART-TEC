@extends("layouts.main")

@section("content")

    <div>
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

        @if($compras->count()>0)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id usuario</th>
                    <th scope="col">Id proveedores</th>
                    <th scope="col">Total compra</th>
                    <th scope="col">Acciones</th>

                </tr>
                </thead>
                <tbody>
                @foreach($compras as $item => $compra)
                    <tr>
                        <td>{{$compra->id}}</td>
                        <td>{{$compra->id_usuario}}</td>
                        <td>{{$compra->id_proveedores}}</td>
                        <td>{{$compra->total_compra}}</td>

                        <td>
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-pencil"></i> Editar
                            </button>

                            <button class="btn btn-sm btn-danger"
                                    data-id="{{$compra->id}}"
                                    data-toggle="modal" data-target="#modalBorrarApertura">
                                <i class="fa fa-trash"></i> Borrar
                            </button>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        <div class="pagination pagination-sm">
            {{$compras->links()}}
        </div>
        @else
            <div class="alert alert-info">
                <h5><i class="fa fa-exclamation-triangle"></i> No hay aperturas de cajas registradas aun.</h5>
            </div>
            @endif
                </tbody>
            </table>
@endsection
