@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Producto</h3>
        </div>
        <div class="card-body">


            <!---Alerta y envia mensajes al cliente cuando hay un error o se registran -->
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

            <form action="{{route("DetalleCompra.update",["id"=>$detalle_compras->id])}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="nombre">Ingrese el nombre:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                           id="nombre"
                           @if(old("nombre"))
                           value="{{old("nombre")}}"
                           @else
                           value="{{$detalle_compras->nombre}}"
                           @endif
                           required
                           placeholder="Ingrese el nombre" maxlength="80">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Ingrese la descripcion:</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                              id="descripcion"
                              required
                              placeholder="Ingrese la descripcion">
                         @if(old("descripcion"))
                            {{old("descripcion")}}
                        @else
                            {{$detalle_compras->descripcion}}
                        @endif
                    </textarea>
                    @error('descripcionn')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="costo_compra">Ingrese el costo de la compra:</label>
                    <input class="form-control @error('costo_compra') is-invalid @enderror" name="costo_compra"
                           id="costo_compra"
                           type="number"
                           min="0"
                           @if(old("costo_compra"))
                           value="{{old("costo_compra")}}"
                           @else
                           value="{{$detalle_compras->costo_compra}}"
                           @endif
                           required
                           placeholder="Ingrese el costo compra" maxlength="80">
                    @error('costo_compra')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cantidad">Ingrese la cantidad</label>
                    <input class="form-control @error('cantidad') is-invalid @enderror" name="cantidad"
                           id="costo_venta"
                           @if(old("cantidad"))
                           value="{{old("cantidad")}}"
                           @else
                           value="{{$detalle_compras->cantidad}}"
                           @endif
                           type="number"
                           min="0"
                           required
                           placeholder="Ingrese el costo venta" maxlength="80">
                    @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_proveedores">Seleccione el prroveedor</label>
                    <div class="input-group">
                        <select id="id_proveedor"
                                name="id_proveedor"
                                class="form-control @error('id_proveedores') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{$proveedor->id}}"
                                @if($detalle_compras->id_proveedor)
                                    {{$detalle_compras->id_proveedor == $proveedor->id ? 'selected="selected"':''}}
                                    @endif
                                >{{$proveedor->nombre}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-outline-success" href="{{route("proveedor.nuevo")}}"
                               type="button"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    @error('id_proveedor')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <!-- -->
            </form>
        </div>
    </div>
@endsection
