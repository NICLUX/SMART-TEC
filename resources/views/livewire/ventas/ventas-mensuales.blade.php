<div>
    <div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card">
            <div class="card-header">
                <h1>Ingresos de {{$fecha_mes}}</h1>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h3 wire:model="total_ingreso_del_dia">Ingresos: <span class="badge badge-warning" >L. {{$total_ingreso_del_dia}}</span></h3>
                        </div>
                        <div class="col-sm">
                            <h3>Costo de venta: <span class="badge badge-danger" >L. {{$total_costo_del_dia}}</span></h3> 
                        </div>
                        <div class="col-sm">
                            <h3>Total Margen de ganancia: <span class="badge {{ (isset($total_ganacia_del_dia)?$total_ganacia_del_dia:-1<0)?'badge-success':'badge-danger'}}">L. {{$total_ganacia_del_dia}}</span></h3> 
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-sm">
                            <div class="alert alert-info">
                                            Productos mas vendidos en <strong>{{$fecha_mes}}</strong>
                                        </div>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                @if(count($productos_mas_vendidos_mes)>0)
                                     
                                    <div class="table-responsive-sm -mr-2">
                                        
                                        <table class="table table-borderless table-hover table-sm">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad </th>
                                                <th scope="col">Total ingresos</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 1; $i<= count($productos_mas_vendidos_mes);$i++)
                                                <tr>
                                                    <th>{{$i}}</th>
                                                    <td>{{$productos_mas_vendidos_mes[$i-1]->nombre}}</td>
                                                    <td>{{$productos_mas_vendidos_mes[$i-1]->total_cantidad}}</td>
                                                    @if($productos_mas_vendidos_mes[$i-1]->total)
                                                        <td>Lps. {{$productos_mas_vendidos_mes[$i-1]->total}}</td>
                                                    @else
                                                        <td>Lps. 0.00</td>
                                                    @endif
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        No se han registrado ventas en el mes de <strong>{{$fecha_mes}}</strong>
                                    </div>
                                @endif
                                </div>
                            
                        </div>
                        <div class="col-sm">
                            <div class="alert alert-info">
                                           Cliente que generan mas ingresos <strong>{{$fecha_mes}}</strong>
                                        </div>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                @if(count($clientes_mas_consumidores)>0)
                                     
                                    <div class="table-responsive-sm -mr-2">
                                        
                                        <table class="table table-borderless table-hover table-sm">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Total ingreos por cliente</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i = 1; $i<= count($clientes_mas_consumidores);$i++)
                                                <tr>
                                                    <th>{{$i}}</th>
                                                    <td>{{$clientes_mas_consumidores[$i-1]->nombre}}</td>
                                                    @if($clientes_mas_consumidores[$i-1]->total)
                                                        <td>Lps. {{$clientes_mas_consumidores[$i-1]->total}}</td>
                                                    @else
                                                        <td>Lps. 0.00</td>
                                                    @endif
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        No se han registrado ventas en el mes de <strong>{{$fecha_mes}}</strong>
                                    </div>
                                @endif
                                </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
    </div>
        <div class="card">
            <div class="card-header">
                <h1>Ventas de {{$fecha_mes}}</h1>
            </div>

            @if(session("exito"))
                <div class="alert alert-success ">
                    {{session("exito")}}
                </div>
            @endif
            @if(session("error"))
                <div class="alert alert-danger ">
                    <i class="fa fa-exclamation-triangle"></i> {{session("error")}}
                </div>
            @endif
            @if ($errors->isNotEmpty())
                <div class="alert alert-danger alert-dismissible ">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-body">
                
                <div class="form-group float-right" style="width: 400px">
                    <div class="input-group-prepend" >
                        <input placeholder="Buscar Mes..."
                                type="date"
                               wire:model="fecha"
                               required
                               class="form-control">
                        <div class="input-prepend">
                            <button class="btn btn-light"  type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                @if(count($ventas)>0)
                    <div class="table-responsive-sm -mr-2">
                        
                        <table class="table table-borderless table-hover table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Codigo </th>
                                <th scope="col">Cliente </th>
                                <th scope="col">Total de Venta</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 1; $i<= count($ventas);$i++)
                                <tr>
                                    <th>{{$i}}</th>
                                    <td>{{$ventas[$i-1]->id}}</td>
                                    <td>{{$ventas[$i-1]->nombre}}</td>
                                    @if($ventas[$i-1]->total)
                                        <td>Lps. {{$ventas[$i-1]->total}}</td>
                                    @else
                                        <td>Lps. 0.00</td>
                                    @endif
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                       </div>
                @else
                    <div class="alert alert-info">
                        No se han registrado ventas en el mes de <strong>{{$fecha_mes}}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
