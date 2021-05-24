@extends("layouts.main")
@extends('servicios.mejora_vista')
@section("content")
    <ul class="list-group" >
        <div class="card-header">
            @yield('buscar')
        </div>
        </li>
    </ul><br>
    <style>
        #encabezado
        {
            margin: 5%;
            background: transparent;
        }
        #color_panel{
            background-color: #5b8583;
            color: white;
        }
        a{
            margin-right:3px
        }
    </style>
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
        <div class="panel-body table-responsive">
            <div class="card card-body">
                <div class="container-fluid">
    @yield('contenido')
    <div style="margin-top: 10px" class="panel-footer" id="pie_pagina">
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
@endsection
