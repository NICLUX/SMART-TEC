@extends("layouts.tabla")
@section("contenido")
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <form style="margin-top: 10px; " method="get" action="{{route('producto.buscar')}}">
                    @csrf
                    <div class="form-inline my-2 my-lg-0 float-right">
                        <input class="form-control"
                               name="busqueda"
                               @if(isset($busqueda))
                               value="{{$busqueda}}"
                               @endif
                               type="search" placeholder="Buscar producto">
                        <div style="margin-left: 3px;" class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <h2 style="color:#ffffff;">
                    PRODUCTOS
                    <a class="btn-sm btn-success float-right" style="margin-right: 10px; width: 38px; height: 38px" href="{{route("producto.nuevo")}}"><i
                            class="fa fa-plus" style="margin: 0 auto; text-align: center"></i></a>
                    <a class="btn-sm btn-info float-right" style="margin-right: 10px; width: 38px; height: 38px" href="{{route("productos.mostrar")}}"><i
                            class="fa fas fa-clone" style="margin: 0 auto; text-align: center"></i></a>
                    <a class="btn-sm btn-warning float-right" style="margin-right: 10px; width: 38px; height: 38px" href="{{route("productos.imprimir")}}"><i
                            class="fa fa-book" style="margin: 0 auto; text-align: center"></i></a>

                </h2>
            </li>
        </ul>
    </div>
@endsection

<div style="margin-top: 10px">
    <div class="card-body">
        @if($productos->count()>0)
            <div class="card-columns">
                @foreach($productos as $producto)
                    <div class="card">

                        <img height="250px" width="250px" src="/images/productos/{{$producto->imagen_url}}"
                             class="card-img-top"
                             onclick="$('#callModalVistaPrevia{{$producto->id}}').click()"
                             onerror="this.src='/images/no_image.jpg'">

                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text"><i
                                    class="fa fa-codepen"></i> {{$producto->getNombreCategoriaAttribute()}}</p>
                            @if($producto->descripcion)
                                <p class="card-text"><strong>Descripcion:</strong> {{$producto->descripcion}}</p>
                            @endif
                            <small class="text-muted"><i class="fa fa-dollar"></i> <strong>Costo Compra:
                                    Lps.</strong> {{$producto->costo_compra}}</small>
                            <br>
                            <small class="text-muted"><i class="fa fa-money"></i> <strong>Costo venta:
                                    Lps.</strong> {{$producto->costo_venta}}</small>
                            @if($producto->en_stock)
                                <div class="alert alert-warning">
                                    <small class="text-muted"><i class="fa fa-star"></i> <strong>En Stock:
                                            #</strong> {{$producto->en_stock}}</small>
                                </div>

                            @else
                                <div class="alert alert-warning">
                                    <small>Este producto no hay en stock</small>
                                </div>
                            @endif
                            <div>
                                <a class="btn-sm btn-success"
                                   href="{{route('producto.editar',['id'=>$producto->id])}}">
                                    <i class="fa fa-pencil"></i></a>

                                <button class="btn-sm btn-danger" data-id="{{$producto->id}}" data-toggle="modal"
                                        data-target="#modalBorrarApertura"
                                        onclick="recibir('{{$producto->id}}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @else
        <div class="alert alert-info">
            <h4>No hay productos agregados aún, presiona el botón de agregar.</h4>
        </div>
@endif


<!-- Modal -->
    <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Esta seguro que deseas borrar el producto?</p>
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

    <script>
        function recibir(numero) {
            var id = numero;
            document.formulario_eliminar.action = "/producto/" + id + "/destroy";
        }
    </script>
@endsection
