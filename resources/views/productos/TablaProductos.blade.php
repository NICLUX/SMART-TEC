@extends('layouts.tabla')
@section("contenido")
    <ul class="list-group" >
        <div class="card-header">
            <form method="get" action="{{route('producto.buscar')}}">
                PRODUCTOS
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
        </div>
        </li>
    </ul><br>
    <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
        <a class="btn-sm btn-secondary btn-sm float-right" href="{{route("productos.index")}}">Nueva Vista</a>
        <a class="btn-sm btn-success float-right" href="{{route("producto.nuevo")}}"><i class="fa fa-plus"></i>Agregar</a>
    </div>
    <div class="container-fluid" >
        <div class="panel panel-success" id="encabezado">
            <div class="panel-heading">
                <div class="row" id="color_panel">
                    <div class="col-xs-12 col-sm-12 col-md-3" >
                        <h2 class="text-center pull-left" style="padding-left: 30px;">
                            <span class="glyphicon glyphicon-list-alt"> </span>Productos</h2>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <div class="card card-body">
                        <div class="container-fluid">
                            @if(count($productos)>0)
                                <div class="table-responsive-sm -mr-2">
                                    <table class="table table-borderless table-hover table-sm">
                                        <thead class="thead-dark">
                                        <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Descripcion</th>
                                <th scope="col" class="text-center">Costo</th>
                                <th scope="col" class="text-center">Categoria</th>
                                <th scope="col" class="text-center">Editar</th>
                                <th scope="col" class="text-center">Eliminar</th>
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
                                        <a class="btn btn-sm btn-success"
                                           href="{{route("producto.editar",["id"=>$producto->id])}}">
                                            <i class="fa fa-pencil"></i></a>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{route("producto.destroy",["id"=>$producto->id])}}">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            <h4>No hay prodcutos registrados aún, presiona el botón de agregar.</h4>
                        </div>
                        @endif
                        </tbody>
                        </table>


                </div>
                <div class="panel-footer" id="pie_pagina">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <p class="muted pull-righ t"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


@endsection
