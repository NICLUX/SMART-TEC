<div>
    <div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card">
            <div class="card-header">
                <div class="form-group float-left center-block" style="width: 300px">
                    <h1>Ingresos del {{$anio}}</h1>
                </div>
                <div class="form-group float-right" style="width: 300px">
                    <div class="input-group-prepend" >
                        <input placeholder="Buscar..."
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
            </div>
            <div class="card-body">
                 
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h3 wire:model="total_ingreso_del_anio">Ingresos: <span class="badge badge-success" >L. {{$total_ingreso_del_anio}}</span></h3>
                        </div>
                        <div class="col-sm">
                            <h3>Costo de venta: <span class="badge badge-danger" >L. {{$total_costo_del_anio}}</span></h3> 
                        </div>
                        <div class="col-sm">
                            <h3>Total Margen de ganancia: <span class="badge {{ (isset($total_ganacia_del_anio)?$total_ganacia_del_anio:-1<0)?'badge-success':'badge-danger'}}">L. {{$total_ganacia_del_anio}}</span></h3> 
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-sm">
                            <div class="alert alert-info">
                                            Productos mas vendidos en <strong>{{$anio}}</strong>
                                        </div>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                @if(count($productos_mas_vendidos_anio)>0)
                                     
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
                                            @for($i = 1; $i<= count($productos_mas_vendidos_anio);$i++)
                                                <tr>
                                                    <th>{{$i}}</th>
                                                    <td>{{$productos_mas_vendidos_anio[$i-1]->nombre}}</td>
                                                    <td>{{$productos_mas_vendidos_anio[$i-1]->total_cantidad}}</td>
                                                    @if($productos_mas_vendidos_anio[$i-1]->total)
                                                        <td>Lps. {{$productos_mas_vendidos_anio[$i-1]->total}}</td>
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
                                        No se han registrado ventas en el mes de <strong>{{$anio}}</strong>
                                    </div>
                                @endif
                                </div>
                            
                        </div>
                        <div class="col-sm">
                            <div class="alert alert-info">
                                           Cliente que generan mas ingresos <strong>{{$anio}}</strong>
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
                                        No se han registrado ventas en el mes de <strong>{{$anio}}</strong>
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
                    <h1>Ingresos xpor Mes del {{$anio}}</h1>
            </div>
            <div class="card-body">
                 
            
                <div class="container">
                    <div class="row">
                    </div>
                    <br>
                    <div class="row" style="text-align: center;" >
                        <div class="col-sm">
                            <h2>Enero</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($enero)?$enero:'0'}} </span> </h3>
                        </div>
                        <div class="col-sm">
                            <h2>Febrero</h2>  
                            <br>  
                            <h3><span class="badge badge-success" >L. {{isset($febrero)?$febrero:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">
                            <h2>Marzo</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($marzo)?$marzo:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">   
                            <h2>Abril</h2>  
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($abril)?$abril:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">
                            <h2>Mayo</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($mayo)?$mayo:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">    
                            <h2>Junio</h2>  
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($junio)?$junio:'0'}}</span></h3>
                       </div>
                    </div>
                    <br>
                    
                    <div class="row" style="text-align: center;" >
                        <div class="col-sm">
                            <h2>Julio</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($julio)?$julio:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">
                            <h2>Agosto</h2> 
                            <br>   
                            <h3><span class="badge badge-success" >L. {{isset($agosto)?$agosto:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">
                            <h2>Septiembre</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($septiembre)?$septiembre:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">   
                            <h2>Octubre</h2> 
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($octubre)?$octubre:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">
                            <h2>Noviembre</h2>
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($noviembre)?$noviembre:'0'}}</span></h3>
                       </div>
                        <div class="col-sm">    
                            <h2>Diciembre</h2>   
                            <br>
                            <h3><span class="badge badge-success" >L. {{isset($diciembre)?$diciembre:'0'}}</span></h3>
                       </div>                        
                    </div>
                    <br>
                </div>
            </div>
    </div>
    </div>
</div>
