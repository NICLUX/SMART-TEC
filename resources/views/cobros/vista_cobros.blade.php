@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cuentas</h3>
        </div>


        <div class="card-body">
            <a class="btn btn-success btn-sm float-right" href="{{route("cuenta.nueva")}}"><i class="fa fa-plus"></i>
                Agregar</a>
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

    <div class="container-fluid" >
        <div class="panel panel-success" id="encabezado">
            <div class="panel-heading">
                <div class="row" id="color_panel">
                    <div class="col-xs-12 col-sm-12 col-md-3" >
                        <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span>Cuentas</h2>
                    </div>
                </div>


                <div class="panel-body table-responsive">



                    @if($cobros->count()>0)
                        <table class="table">
                            <thead class="table table-hover">

                            <tr id="tabla">
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Cliente</th>
                                <th scope="col" class="text-center">Valor de Compra</th>
                                <th scope="col" class="text-center">Detalle</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cobros as $item=> $cobro)

                                <tr id="resultados">
                                    <th scope="row">{{$cobro->id}}</th>
                                    <td>{{$cobro->id_cliente}}</td>
                                    <td>{{$cobro->costo_compra}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success"
                                           href="{{route("cobros.editar",["id"=>$cobro->id])}}">
                                            <i class="fa fa-pencil"></i></a>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{route("cobros.destroy",["id"=>$cobro->id])}}">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            <h4>No hay ninguna lista de cobros registradas</h4>
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
