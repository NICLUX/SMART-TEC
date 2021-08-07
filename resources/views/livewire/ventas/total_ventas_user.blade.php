@extends('layouts.tabla')
@section('buscar')
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1d334b">
                <h2 style="color:#ffffff;">
                    VENTAS TOTALES POR USUARIO
                </h2>
            </li>
        </ul>
    </div>
@endsection
@section("contenido")
    <br>
                <div class="panel-body">
                    @if($total->count()>0)
                        <table class="table table-sm">
                            <thead class="table table-hover">
                            <tr>
                                <th scope="col" class="text-justify">Fecha de compra</th>
                                <th scope="col" class="text-justify">Nombre</th>
                                <th scope="col" class="text-justify">Nombre Usuario</th>
                                <th scope="col" class="text-justify">Total Venta</th>
                            </tr>
                            </thead>
                            <tbody class="table table-hover">
                            @foreach($total as $item=> $to)
                                <tr id="resultados">
                                    <td>{{$to->fecha_venta}}</td>
                                    <td>{{$to->name}}</td>
                                    <td>{{$to->usuario}}</td>
                                    <td>{{$to ->total}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            <h4>No hay ventas registradas aún.</h4>
                        </div>
                    @endif
        </div>
@endsection
