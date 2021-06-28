@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")
    <br>
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

    <br>
    <div class="container-fluid" >
        <div class="panel panel-success" id="encabezado">
            <div class="panel-heading">
                <div class="row" id="color_panel">
                    <div class="col-xs-12 col-sm-12 col-md-3" >
                        <h2 class="text-center pull-left">
                            <span class="glyphicon glyphicon-list-alt"> </span>Ventas totales por usuario</h2>
                    </div>
                </div>
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
                            <h4>No hay ventas registrados aún.</h4>
                        </div>
                    @endif
        </div>
@endsection
