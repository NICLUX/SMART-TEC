@extends('layouts.tabla')
@section("contenido")
    <ul class="list-group" >
        <li class="list-group-item sm">Listado de Categorias
            <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
                <a class="btn-sm btn-secondary btn-sm float-right" href="{{route("servicios.index")}}">Nueva Vista</a>
                <a class="btn-sm btn-success float-right" href="{{route("servicios.crear")}}"><i class="fa fa-plus"></i>Agregar</a>
            </div>
        </li>
    </ul>
    <div class="container-fluid" >
        <div class="panel panel-success" id="encabezado">
            <div class="panel-heading">
                <div class="row" id="color_panel">
                    <div class="col-xs-12 col-sm-12 col-md-3" >
                        <h2 class="text-center pull-left" style="padding-left: 30px;">
                            <span class="glyphicon glyphicon-list-alt"> </span>Categorias</h2>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <div class="card card-body">
                        <div class="container-fluid">
                            @if(count($categorias)>0)
                                <div class="table-responsive-sm -mr-2">
                                    <table class="table table-borderless table-hover table-sm">
                                        <thead class="thead-dark">
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Editar</th>
                         <th scope="col">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $item=> $categoria)
                        <tr id="resultados">
                            <th scope="row">{{$item+ $categorias->firstItem()}}</th>
                            <td>{{$categoria->nombre}}</td>
                            <td width="20%" height="10%">
                                <img src="/images/categorias/{{$categoria->imagen}}"
                                     onclick="$('#callModalVistaPrevia{{$categoria->id}}').click()"
                                     onerror="this.src='/images/no_image.jpg'"></td>
                            </td>
                            <td>
                                <!---Boton Editar-->
                                <a class="btn-success btn-sm"
                                   href="{{route("categoria.editar",['id'=>$categoria->id])}}"
                                   title="Editar"><i class="fa fa-pencil"></i>Editar</a>
                                <!---Boton Eliminar-->
                            </td>
                            <td>
                                <a class="btn-danger btn-sm"
                                   href="{{route("categoria.destroy",["id"=>$categoria->id])}}"
                                   title="Eliminar">
                                    <i class="fa fa-trash"></i>Borar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
               @endif
                <div class="pagination pagination-sm justify-content-center">
                    {{$categorias->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection
