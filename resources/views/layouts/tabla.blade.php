@extends("layouts.main")
@extends('servicios.mejora_vista')
@section("content")
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

    @yield('contenido')
@endsection
