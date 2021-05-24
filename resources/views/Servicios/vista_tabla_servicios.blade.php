@extends('layouts.tabla')
@section("contenido")
    <ul class="list-group" >
        <li class="list-group-item sm">Listado de Servicios
            <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
                <a class="btn-sm btn-secondary btn-sm float-right" href="{{route("servicios.nuevaVista")}}">Nueva Vista</a>
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
                            <span class="glyphicon glyphicon-list-alt"> </span>Clientes</h2>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <div class="card card-body">
                        <div class="container-fluid">
    @if(count($servicios)>0)
        <div class="table-responsive-sm -mr-2">
            <table class="table table-borderless table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-justify">#</th>
                    <th scope="col" class="text-justify">Nombre</th>
                    <th scope="col" class="text-justify">Descripcion</th>
                    <th scope="col" class="text-justify">Costo</th>
                    <th scope="col" class="text-justify">Categoria</th>
                    <th scope="col" class="text-justify">Editar</th>
                    <th scope="col" class="text-justify">Eliminar</th>
                </tr>
        </thead>
        <tbody>
        @foreach($servicios as $item=> $servicioo)
            <tr class="text-justify">
                <th scope="row">{{$servicioo->id}}</th>
                <td>{{$servicioo->nombre}}</td>
                @if($servicioo->descripcion)
                    <td>{{$servicioo->descripcion}}</td>
                @else
                    <td>n/a</td>
                @endif
                <td>{{$servicioo->costo_de_venta}}</td>
                <td>{{$servicioo ->id_categoria}}</td>
                <td>
                    <a class="btn-sm btn-success"
                       href="{{route("servicios.editar",["id"=>$servicioo->id])}}">
                        <i class="fa fa-pencil"></i></a>
                </td>
                <td>
                    <a class="btn-sm btn-danger"
                       href="{{route("servicios.destroy",["id"=>$servicioo->id])}}">
                        <i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        @else
            <div class="alert alert-info">
                <h4>No hay servicios registrados aún, presiona el botón de agregar.</h4>
            </div>
        @endif
        </tbody>
     </table>
            <div class="card-footer1 ">
                <div class="pagination pagination-sm justify-content-center">
                    {{$servicios->links("pagination::bootstrap-4")}}
                </div>
            </div>
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
