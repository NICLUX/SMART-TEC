@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")



        <div class="btn-group float-right float-left" role="group" aria-label="Basic example" id="botones_ser">
                <a class="btn btn-secondary float-right" href="{{route("servicios.index")}}">Nueva Vista</a>
                <a class="btn btn-secondary float-right" href="{{route("servicios.crear")}}"> Agregar Producto</a>
        </div>
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

        <div class="container-fluid" >
            <div class="panel panel-success" id="encabezado">
                <div class="panel-heading">
                    <div class="row" id="color_panel">
                        <div class="col-xs-12 col-sm-12 col-md-3" >
                            <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span>Servicio</h2>
                        </div>
                    </div>


        <div class="panel-body table-responsive">



        @if($servicios->count()>0)
        <table class="table">
            <thead class="table table-hover">

        <tr id="tabla">
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

        @foreach($servicios as $item=> $servicioo)

            <tr id="resultados">
                <th scope="row">{{$servicioo->id}}</th>
                <td>{{$servicioo->nombre}}</td>
                @if($servicioo->descripcion)
                    <td>{{$servicioo->descripcion}}</td>
                @else
                    <td>n/a</td>
                @endif
                <td>{{$servicioo->costo_venta}}</td>
                <td>{{$servicioo ->id_categoria}}</td>
                <td>
                    <a class="btn btn-sm btn-success"
                       href="{{route("servicios.editar",["id"=>$servicioo->id])}}">
                        <i class="fa fa-pencil"></i></a>

                </td>
                <td>
                    <a class="btn btn-sm btn-danger"
                       href="{{route("servicios.destroy",["id"=>$servicioo->id])}}">
                        <i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @else
            <div class="alert alert-info">
                <h4>No hay servicios registrados aún, presiona el botón de agregar.</h4>
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
