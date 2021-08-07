@extends("layouts.tabla")
@section("contenido")
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                    <form method="get" action="{{route('producto.buscar')}}">
                        @csrf
                        <div class="form-inline my-2 my-lg-0 float-right">
                            <input class="form-control"
                                   name="busqueda"
                                   @if(isset($busqueda))
                                   value="{{$busqueda}}"
                                   @endif
                                   type="search" placeholder="Buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
            </li>
        </ul>
    </div>
@endsection
<div class="col">
    <ul class="list-group">
        <li class="list-group-item" style="background-color:#1c2d3f">
            <h2 style="color:#ffffff;">
                PRODUCTOS
                <a class="btn-success btn-sm float-right" href="{{route('producto.nuevo')}}"><i class="fa fa-plus"></i>
                    Agregar</a>
                <a class="btn-sm btn-info float-right" style="margin-right:3px"
                   href="{{route("productos.mostrar")}}"><i class="fa fas fa-clone"></i> Lista </a>
                <a class="btn-warning btn-sm float-right" href="{{route('productos.imprimir')}}"><i class="fa fa-book" aria-hidden="true"></i>
                    Imprimir</a>
            </h2>
        </li>
    </ul>
</div>
<div style="margin-top: 10px">
        <div class="card-body" >
            @if($productos->count()>0)
                <div class="card-columns">
                    @foreach($productos as $producto)
                        <div class="card">

                            <img style="max-height: 250px; min-height: 250px" src="/images/productos/{{$producto->imagen_url}}"
                                 class="card-img-top"
                                 onclick="$('#callModalVistaPrevia{{$producto->id}}').click()"
                                 onerror="this.src='/images/no_image.jpg'">

                            <div class="card-body">
                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                <p class="card-text"><i class="fa fa-codepen"></i> {{$producto->getNombreCategoriaAttribute()}}</p>
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
                                    <i class="fa fa-pencil"></i> Editar</a>

                                <button class="btn-sm btn-danger"
                                        data-id="{{$producto->id}}"
                                        data-toggle="modal" data-target="#modalBorrarApertura">
                                    <i class="fa fa-trash"></i> borrar</button>
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
        <div class="modal fade"id="modalBorrarApertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="modal-footer">
                        <input id="idApertura" name="id">
                        <a class="btn-sm btn-danger"
                           href="{{route("producto.destroy",["id"=>$producto->id])}}"> Eliminar</a>
                        <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>

        </div>

@endsection
