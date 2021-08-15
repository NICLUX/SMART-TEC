@extends('layouts.tabla')
@section('buscar')

    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1d334b">
                <form method="get" action="{{route("ventas.buscar")}}">
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
                <h2 style="color:#ffffff; margin-top: 10px">
                    VENTAS POR USUARIO
                </h2>
            </li>
        </ul>
    </div>
@endsection
@section("contenido")
    <br>
    <div class="panel-body">
        @if($total->count()>0)
            <table style="margin-top: 10px" class="table table-sm">
                <tr id="tabla" style="background-color: black; color: whitesmoke">
                    <th scope="col" class="text-justify">Fecha de compra</th>
                    <th scope="col" class="text-justify">Nombre</th>
                    <th scope="col" class="text-justify">Nombre Usuario</th>
                    <th scope="col" class="text-justify">Total Venta</th>
                </tr>

                @foreach($total as $item=> $to)
                    <tr id="resultados">
                        <td>{{$to->fecha_venta}}</td>
                        <td>{{$to->name}}</td>
                        <td>{{$to->usuario}}</td>
                        <td>{{$to ->total}}</td>
                    </tr>
                @endforeach

            </table>
        @else
            <div class="alert alert-info">
                <h4>No hay ventas registradas aún.</h4>
            </div>
        @endif
    </div>
@endsection
