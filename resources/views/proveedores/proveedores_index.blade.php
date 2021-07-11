@extends('layouts.tabla')
@section('buscar')

<div class="col">
    <ul class="list-group">
        <li class="list-group-item" style="background-color:#1c2d3f">
            <h2 style="color:#ffffff;">
                PROVEEDORES
                <a class="btn-sm btn-success float-right" href="{{route("proveedor.nuevo")}}"><i class="fa fa-plus"></i>
                    Agregar</a>
            </h2>
        </li>
    </ul>
</div>

@endsection
@section("contenido")

<style>
    #tabla_prove tr:hover{
        background-color: gainsboro;

    }
</style>
@if(count($proveedores)>0)

<div class="table-responsive-sm -mr-2">
    <table id="tabla_prove" name="tabla_prove" class="table table-borderless table-sm">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col" style="white-space: nowra">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col" style="white-space: nowra">Descripción</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $item=> $proveedor)
            <tr id="resultados">
                <th scope="col">{{$item+$proveedores->firstItem()}}</th>
                <td>{{$proveedor->nombre}}</td>
                <td style="white-space: nowra">{{$proveedor->direccion}}</td>
                <td>{{$proveedor->telefono}}</td>
                @if($proveedor->descripcion)
                <td style="white-space: nowra">{{$proveedor->descripcion}}</td>
                @else
                <td>n/a</td>
                @endif
                @if($proveedor->email)
                <td>{{$proveedor->email}}</td>
                @else
                <td>n/a</td>
                @endif
                <td>
                    <a class="btn-sm btn-success" href="{{route("proveedor.editar",["id"=>$proveedor->id])}}"
                        title="Editar"><i class="fa fa-pencil"></i> Editar</a>

                    <button class="btn-sm btn-danger" data-id="{{$proveedor->id}}" data-toggle="modal"
                        data-target="#modalBorrarApertura">
                        <i class="fa fa-trash"></i> Borrar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination pagination-sm justify-content-center">
        {{$proveedores->links()}}
    </div>
    @else
    <div class="alert alert-info">
        <h4>No hay proveedores agregados aún, presiona el botón de agregar.</h4>
    </div>
    @endif
    <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar proveedor</h5>
                    <button type="button" class="close btn-sm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que deseas borrar el proveedor?</p>
                </div>
                <form name="formulario_eliminar" action="procesar.asp" method="POST">
                    <div class="modal-footer">
                        <input id="idApertura" name="id">
                        <a class="btn-danger btn-sm"
                            href="{{route('proveedor.destroy',['id'=>isset($proveedor->id)?$proveedor->id:0])}}">
                            Eliminar</a>
                        <button type="button" class="btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
