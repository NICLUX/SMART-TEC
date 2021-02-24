@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
    <div>
        <nav aria-label="breadcrumb">
            <h4 class="breadcrumb">Realizar una compra</h4>
        </nav>
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
        <div class="row">
        <div class="card card-body">
                    <div class="container-fluid">
            <form method="POST" action="{{ route('compras.crear') }}">
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
                <br><br>
                <h4>Detalle compra:</h4>
                <div class="panel panel-primary row">
                    <div class="card card-body col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-left: 12px" >
                        <div class="panel-body" >
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <x-jet-label for="numero_comprobante" value="{{ __('Ingrese el producto:') }}" />
                                        <select class="form-control " required>
                                            <div id="pid_producto" name="pid_producto" class="form-group ">
                                                    @foreach($productos as $item => $producto)
                                                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                    @endforeach
                                            </div>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="pcosto_compra" value="{{ __('Precio de compra:') }}" />
                                        <input type="number" class="form-control " id="pcosto_compra"
                                               name="pcosto_compra" placeholder="Precio de compra" required>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="numero_comprobante" value="{{ __('Precio de venta:') }}" />
                                        <input type="number" class="form-control " id="pcosto_venta"
                                               name="pcosto_venta" placeholder="Precio de venta" required>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <x-jet-label for="numero_comprobante" value="{{ __('Cantidad:') }}" />
                                        <input type="number" class="form-control" id="pcantiadad"
                                               name="pcantiadad" placeholder="Cantidad" required>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <br>
                                        <botton type="botton" class=" btn btn-success  btn-sm col-sm-12 col-xs-12"
                                                id="bt_add">Agregar</botton>
                                    </div>
                                </div>
                                <div class="container-fluid" >
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
                                           <tbody>

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
                    </div>
                </div>
               </div>
              </div>
                <div style="margin-top: 10px" class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                    <input name="_token" value="{{csrf_token()}}" type="hidden">
                    <button class="btn btn-success btn-sm float-right col-lg-2 col-sm-2 col-md-2 col-xs-12" type="submit" href="{{route("compras.store")}}">
                        Guardar</button>
                    <button  style="margin-right: 5px"class="btn btn-danger btn-sm float-right col-lg-2 col-sm-2 col-md-2 col-xs-12" type="reset" >
                        Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
                <script>
                    $(document).ready(function(){
                        $('#bt_add').click(function (){
                            agregar();
                        })
                    })
                    var cont =0;
                    total=0;
                    sub_total=[];
                    $("#guardar").hide();
                    function agregar(){
                        id_producto=$("#pid_producto").val();
                        producto=$("#pid_producto option:selected").text();
                        cantidad=$("#pcantiadad").val();
                        costo_compra=$("#pcosto_compra").val();
                        costo_venta=$("#costo_venta").val();

                        if(id_producto != "" && costo_compra != "" && costo_venta!="" && cantidad>0){
                            sub_total[cont]=(cantidad*costo_compra);
                            total=total+ sub_total[cont];
                            var fila = '<tr class="selected" id="fila'+cont+'">' +
                                '<td><button class="btn btn-danger btn-sm " type="botton" onclick="eliminar('+cont+');" >X</button></td>' +
                                '<td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td>'+
                                '<td><input type="hidden" name="costo_compra[]" value="'+costo_compra+'">'+costo_compra+'</td>'+
                                '</td><td><input type="hidden" name="costo_venta[]" value="'+costo_venta+'">'+costo_venta+'</td>'+
                                '</td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td>'+
                                '</td><input>'+sub_total[cont]+'</td></td></tr>'
                            cont++;
                            limpiar();
                            $("#total").html("L/."+total);
                            evaluar();
                            $("detalles").append(fila);
                        }else {
                            alert("error al ingresas detalles compra favor revise los datos compra");
                        }
                    }
                    function limpiar(){
                        $("#pcoso_compra").val("");
                        $("#pcoso_venta").val("");
                        $("#pcantida").val("");
                    }
                    function evaluar(){
                       if(total>0){
                           $("#guardar").show();
                       }else{
                           $("#guardar").hide();
                       }
                    }
                    function eliminar(){
                       total=total-sub_total[index];
                        $("#total").html("L/."+total);
                        $("#fila"+index).remove();
                        evaluar();
                    }
                </script>
    @endpush
@endsection
