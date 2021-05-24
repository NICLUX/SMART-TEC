@extends('compras.CrearCompra')
@section('contenido')
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
<div data-class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <h1 class="alert alert-dark" role="alert" class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12">Detalle
        compra</h1>
    <div class="panel-body">
        <div class="card card-body" class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="container-fluid">

                <form method="POST" action="{{ route('compras.nuevo') }}">
                    @csrf
                    <div class="input-group">
                        <select id="id_usuario" style="display: none" name="id_usuario"
                            class="form-control @error('id_usuario') is-invalid @enderror" required>
                            <option value="{{Auth::user()->id}}">{{Auth::user()->usuario}}</option>
                        </select>
                    </div>
                    @error('id_usuario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                <x-jet-label for="id_proveedore" value="{{ __('Proveedore') }}" />
                                <div class="input-group">
                                    <select id="id_proveedore"
                                            name="id_proveedore"
                                            class="form-control @error('id_proveedore') is-invalid @enderror" required>
                                        <option value="" selected disabled>Seleccione una opcion</option>
                                        @foreach($proveedores as $pro)
                                            <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                                        @endforeach
                                    </select>@yield('nuevo')
                                </div>
                                @error('id_proveedore')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <x-jet-label for="numero_comprobante" value="{{ __('Numero comprobante:') }}" />
                                <input placeholder="ingrese numero de comprobante" id="numero_comprobante"
                                    class="form-control" type="number" name="numero_comprobante"
                                    :value="old('numero_comprobante')" required autofocus
                                    autocomplete="numero_comprobante" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <x-jet-label for="pid_producto" value="{{ __('Ingrese el producto:') }}" />
                            <div class="input-group">
                                <select name="pid_producto" id="pid_producto"
                                        class="form-control @error('pid_producto') is-invalid @enderror" required>
                                    <option value="" selected disabled>Seleccione una opcion</option>
                                    @foreach($productos as $item => $producto)
                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                    @endforeach
                                </select>
                                @yield('nuevo_prod')
                            </div>
                            @error('pid_producto')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <x-jet-label for="pcosto_compra" value="{{ __('Precio de compra:') }}" />
                            <input type="number" class="form-control " id="pcosto_compra" name="pcosto_compra"
                                   placeholder="Precio de compra">
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <x-jet-label for="pcosto_venta" value="{{ __('Precio de venta:') }}" />
                            <input type="number" class="form-control " id="pcosto_venta" name="pcosto_venta"
                                   placeholder="Precio de venta">
                        </div>
                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <x-jet-label for="pcantidad" value="{{ __('Cantidad:') }}" />
                            <input type="number" class="form-control" id="pcantidad" name="pcantidad"
                                   placeholder="Cantidad">
                        </div>
                        <div style="margin-top:3%" class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <botton type="botton" class="col-sm-12 col-xs-12 btn btn-outline-primary"
                                    role="alert" id="bt_add"><i
                                    class="fa fa-arrow-right"></i>Agregar</botton>
                        </div>
                    </div>
                    <div class="panel panel-success" id="encabezado">
                        <div class="panel-heading">
                            <div class="panel-body table-responsive">
                                <div class="table-responsive-sm -mr-2">
                                    <table class="table table-borderless table-hover table-sm">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Producto</th>
                                            <th>Costo compra</th>
                                            <th>Costo venta</th>
                                            <th>Cantidad</th>
                                            <th>Sub_total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalles">
                                    </tbody>
                                    <tfoot>
                                        <tr id="resultados">
                                            <th colspan="5">Total</th>
                                            <th>
                                                <h4 id="total">L/. 0.00</h4>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 10px" class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                        <button id="guardar" class="btn-outline-primary btn-sm alert alert-primary
                                             float-right col-lg-2 col-sm-2 col-md-2 col-xs-12" type="submit"
                            href="{{route("compras.store")}}" role="alert">
                            Guardar</button>
                        <button style="margin-right: 5px"
                            class="btn-outline-danger alert alert-danger btn-sm float-right col-lg-2 col-sm-2 col-md-2 col-xs-12"
                            type="reset" role="alert">
                            Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@yield('modal')
@yield('modals')
@endsection
