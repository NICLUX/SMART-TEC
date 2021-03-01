@extends('compras.CrearCompra')
@section('contenido')
       <div class="panel panel-primary row" >
                    <div style="margin-top:20px"   data-class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12" >
                        <h1 style="margin-left:80px"  class="alert alert-dark" role="alert"  style="margin-bottom: 5px"
                                       class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12">Detalle compra</h1>
                        <div style="margin-left:80px" class="panel-body">
                            <div  style="margin-top: 20px" style="margin-right:60px" class="card card-body" class="card card-body col-lg-11 col-sm-12 col-md-11 col-xs-12">
                                <div  class="container-fluid">
                                    <form method="POST" action="{{ route('compras.nuevo') }}">
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            @csrf
                                            <x-jet-label for="id_usuario" value="{{ __('id_usuario') }}" />
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="id_usuario">
                                                <div class="form-group">
                                                    <option>Seleccione el usuario:</option>
                                                    @foreach($users as $item => $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </div>
                                            </select>
                                        </div>

                                        <div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <x-jet-label for="id_proveedore" value="{{ __('id_proveedore') }}" />
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                        name="id_proveedore">
                                                    <div class="form-group">
                                                        <option>Seleccione el proveedor:</option>
                                                        @foreach($proveedores as $item => $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                        @endforeach
                                                    </div>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <x-jet-label for="numero_comprobante" value="{{ __('Numero comprobante:') }}" />
                                                <x-jet-input placeholder="ingrese numero de comprobante" id="numero_comprobante"
                                                             class="form-control"
                                                             type="text" name="numero_comprobante" :value="old('numero_comprobante')"
                                                             required autofocus autocomplete="numero_comprobante"/>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <x-jet-label  for="impuesto" value="{{ __('Impuesto:') }}" />
                                                <x-jet-input placeholder="ingrese el impuesto" id="impuesto"
                                                             class="form-control" type="text"
                                                             name="impuesto" :value="old('impuesto')"
                                                             required autofocus autocomplete="impuesto" />
                                            </div>
                                        </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <x-jet-label for="pid_producto" value="{{ __('Ingrese el producto:') }}" />
                                        <select class="form-control" name="pid_producto" id="pid_producto">
                                            <div class="form-group">
                                                <option>Seleccione el producto</option>
                                                @foreach($productos as $item => $producto)
                                                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                @endforeach
                                            </div>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="pcosto_compra" value="{{ __('Precio de compra:') }}" />
                                        <input type="number" class="form-control " id="pcosto_compra"
                                               name="pcosto_compra" placeholder="Precio de compra">
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="pcosto_venta" value="{{ __('Precio de venta:') }}" />
                                        <input type="number" class="form-control " id="pcosto_venta"
                                               name="pcosto_venta" placeholder="Precio de venta">
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="pcantidad" value="{{ __('Cantidad:') }}" />
                                        <input type="number" class="form-control" id="pcantidad"
                                               name="pcantidad" placeholder="Cantidad">
                                    </div>
                                    <div style="margin-top:10px"   class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <br>
                                        <botton type="botton"
                                                class="col-sm-12 col-xs-12 btn-outline-info alert alert-info" role="alert"
                                                id="bt_add" >Agregar</botton>
                                    </div>

                                <div class="container-fluid">
                                    <div class="panel panel-success" id="encabezado">
                                        <div class="panel-heading">
                                            <div class="panel-body table-responsive">
                                                <table style="margin-top: 25px" class="table" id="detalles">
                                                    <thead class="table table-hover">
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Producto</th>
                                                        <th>Costo compra</th>
                                                        <th>Costo venta</th>
                                                        <th>Cantidad</th>
                                                        <th>Sub_total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="resultados">

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="5">Total</th>
                                                        <th><h4 id="total">L/. 0.00</h4></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <div style="margin-top: 10px" class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                                            <input name="_token" value="{{csrf_token()}}" type="hidden">
                                            <button class="btn-outline-primary btn-sm alert alert-primary
                                             float-right col-lg-2 col-sm-2 col-md-2 col-xs-12"
                                                    type="submit" href="{{route("compras.store")}}" role="alert">
                                                Guardar</button>
                                            <button  style="margin-right: 5px"class="btn-outline-danger alert alert-danger btn-sm float-right col-lg-2 col-sm-2 col-md-2 col-xs-12"
                                                     type="reset" role="alert">
                                                Cancelar</button>
                                        </div>
                                    </form>
                            </div>

                    </div>
                </div>
        </div>
    </div>
@endsection
