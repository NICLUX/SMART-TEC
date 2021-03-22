@extends("layouts.main")
@section("content")

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">PRODUCTOS</h3>
        </div>

        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route('producto.nuevo')}}"><i class="fa fa-plus"></i>
                Agregar</a>
            <br>
            <br>
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

            <br>

            <br>

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
            @if($productos->count()>0)
                <div class="card-columns">
                    @foreach($productos as $producto)
                        <div class="card">
                            <img src="/images/productos/{{$producto->imagen_url}}"
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

                                <br>
                                @if($producto->en_stock)
                                    <small class="text-muted"><i class="fa fa-star"></i> <strong>En Stock:
                                            #</strong> {{$producto->en_stock}}</small>
                                @else
                                    <div class="alert alert-warning">
                                        <small>Este producto no hay en stock</small>
                                    </div>

                                @endif
                                <br>
                                <a class="btn btn-sm btn-success"
                                   href="{{route('producto.editar',['id'=>$producto->id])}}">
                                    <i class="fa fa-pencil"></i> Editar</a>

                                <button class="btn btn-sm btn-danger"
                                        data-id="{{$producto->id}}"
                                        data-toggle="modal" data-target="#modalBorrarApertura" 
                                        onclick= "recibir('{{$producto->id}}')" >
                                    <i class="fa fa-trash"></i> Borrar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    No hay productos ingresados aun
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que deseas borrar el producto?</p>
                </div>
                <form name="formulario_eliminar" action="procesar.asp" method="POST" >
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
        function recibir(numero){
            alert(numero);
            var id =  numero;           
            document.formulario_eliminar.action="/producto/"+id+"/eliminar";        
            alert(document.formulario_eliminar.action);
        } 
    </script>
@endsection
