@extends('layouts.tabla')
@section("contenido")
    @section('buscar')
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color:#1c2d3f">
                        <h2 style="color:#ffffff;">
                            PRODUCTOS
                            <a class="btn-success btn-sm float-right" href="{{route('producto.nuevo')}}"><i class="fa fa-plus"></i>
                                Agregar</a>
                            <a class="btn-sm btn-success float-right" style="margin-right:3px"
                               href="{{route("productos.index")}}"><i class="fa fas fa-clone"></i> Tabla </a>
                            <a class="btn-warning btn-sm float-right" href="{{route('productos.imprimir')}}"><i class="fa fa-book" aria-hidden="true"></i>
                                Imprimir</a>
                        </h2>
                    </li>
                </ul>
            </div>

    @endsection
@if(count($productos)>0)
    <div class="table-responsive-sm -mr-2">
        <table class="table table-borderless table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col" >#</th>
                <th scope="col" >Nombre</th>
                <th scope="col" >Descripcion</th>
                <th scope="col" >Costo</th>
                <th scope="col" >Categoria</th>
                <th scope="col" >Editar</th>
                <th scope="col" >Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $item=> $producto)
                <tr id="resultados">
                    <th scope="row">{{$producto->id}}</th>
                    <td>{{$producto->nombre}}</td>
                    @if($producto->descripcion)
                        <td>{{$producto->descripcion}}</td>
                    @else
                        <td>n/a</td>
                    @endif
                    <td>{{$producto->costo_venta}}</td>
                    <td>{{$producto ->id_categoria}}</td>
                    <td>
                        <a class="btn-sm btn-success"
                           href="{{route("producto.editar",["id"=>$producto->id])}}">
                            <i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                        <button class="btn-sm btn-danger"
                                data-id="{{$producto->id}}"
                                data-toggle="modal" data-target="#modalBorrarApertura">
                            <i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
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
