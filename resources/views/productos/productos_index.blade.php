@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Productos</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route("producto.nuevo")}}"><i class="fa fa-plus"></i>
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
                            <th scope="col">Categoria</th>
                            <th scope="col">Costo de compra</th>
                            <th scope="col">Costo de venta</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Opciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$producto->nombre}}</td>
                                @if($producto->descripcion)
                                <td>{{$producto->descripcion}}</td>
                                @else
                                    <td>n/a</td>
                                @endif
                                <td>{{$producto->nombre_categoria}}</td>
                                <td>{{$producto->costo_compra}}</td>
                                <td>{{$producto->costo_venta}}</td>
                                <td> <img src="/images/productos/{{$producto->imagen_url}}"
                                          onclick="$('#callModalVistaPrevia{{$producto->id}}').click()"
                                          width="150px" height="150px" style="object-fit: contain"
                                          onerror="this.src='/images/no_image.jpg'"></td>
                                <td><a class="btn btn-sm btn-success"
                                    href="{{route("producto.editar",["id"=>$producto->id])}}">
                                        <i class="fa fa-pencil"></i></a>

                                    <a class="btn btn-danger btn-sm"
                                    href="{{route("producto.destroy",["id"=>$producto->id])}}"><i class="fa fa-trash"></i></a>
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