@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" >Listado Compras</li>
            </ol>
        </nav>
        <hr>
        <a class="btn btn-success btn-sm float-right" href="{{route("compras.crear")}}"><i class="fa fa-plus"></i> Agregar Compra</a>
        <br><br>
        @if(session("exito"))
            <div class="alert alert-success ">
             </div>
        @endif
        <div class="container-fluid" >
            <div class="panel panel-success" id="encabezado">
                <div class="panel-heading">
                    <div class="row" id="color_panel">
                        <div class="col-xs-12 col-sm-12 col-md-3" >
                            <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt">
                                </span>Compras</h2>
                        </div>
                    </div>

                    <div class="panel-body table-responsive">
        @if($compras->count()>0)
            <table class="table">
                <thead class="table table-hover">
                <tr id="tabla">
                    <th scope="col">#</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">proveedor</th>
                    <th scope="col">Fecha Hora</th>
                    <th scope="col">numero comptobante</th>
                    <th scope="col">Impuesto</th>
                    <th scope="col">Total compra</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compras as $compra)
                    <tr id="resultados">
                        <th scope="row">{{$compra->id}}</th>
                        <td>{{$compra->name}}</td>
                        <td>{{$compra->nombre}}</td>
                        <td>{{$compra->feche_hora}}</td>
                        <td>{{$compra->numero_comprobante}}</td>
                        <td>{{$compra->impuesto}}</td>
                        <td>{{$compra->total}}</td>

                        <td><a class="btn btn-sm btn-success"
                               href="{{route("compras.editar",["id"=>$compra->id])}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-warning btn-sm"
                               href="{{route("compras.destroy",["id"=>$compra->id])}}">
                                <i class="fa-window-restore"></i></a>
                            <a class="btn btn-danger btn-sm"
                               href="{{route("compras.destroy",["id"=>$compra->id])}}">
                                <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                <h5><i class="fa fa-exclamation-triangle"></i> No hay compras registradas aun.</h5>
            </div>
            @endif
                    </div>
                </div>
            </div>
        </div>
                </tbody>
            </table>
@endsection
