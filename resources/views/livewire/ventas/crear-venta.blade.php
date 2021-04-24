<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <!--TODO validar que evite cerrar la ventana o ir hacia atras-->
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h3 style="align-items: flex-start;" class="card-title">Crear venta</h3>
                    </div>

                    <a class="btn btn-success btn-sm float-right" href="{{route("ventas.index")}}">
                        Historial</a>
                </div>
            </div>
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
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <br>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="form-group" style="display: none">
                        <label>Seleccione el usuario:</label>
                        <select wire:model="id_usuario" required class="form-control  @error(" id_usuario") is-invalid
                            @endError" id="selectCliente">
                            <option value="{{Auth::user()->id}}">{{Auth::user()->usuario}}</option>
                        </select>
                        @error("id_usuario")
                        <span class="alert-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col" wire:ignore>
                        <div class="form-group">
                            <label>Seleccione el cliente:</label>
                            <select wire:model="id_cliente" required class="form-control  @error(" id_cliente")
                                is-invalid @endError" id="selectCliente">
                                <option selected value="">Seleccione un cliente</option>
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}
                                    || {{$cliente->telefono}}</option>
                                @endforeach
                            </select>
                            @error("id_cliente")
                            <span class="alert-error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Fecha:</label>
                            <input class="form-control @error(" fecha_venta") is-invalid @endError"
                                wire:model="fecha_venta" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Venta</label>
                            <div class="input-group-prepend">
                                <span disabled="true" class="btn btn-sm btn-light">Lps.</span>
                                <input class="form-control" wire:model="total_venta" placeholder="Total venta" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col" wire:ignore>
                        <label>Seleccione los productos:</label>
                        <div class="input-group">
                            <select class="form-control @error(" id_producto") is-invalid @endError" required
                                wire:model="id_producto" wire:model="productos" name="producto" id="selectProductos">
                                <option selected value="">Seleccione un producto</option>
                                @foreach($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->nombre}}
                                    || {{$producto->nombre_categoria}} || Precio:
                                    Lps. {{$producto->costo_venta}} || Stock: {{$producto->getEnStockAttribute()}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-prepend">
                                <input wire:model="cantidad" type="number" min="1" required
                                    placeholder="Ingrese la cantidad" class="form-control @error(" cantidad") is-invalid
                                    @endError">
                                <button class="btn btn-sm btn-dark" wire:click.prevent="agregarProducto()"><i
                                        class="fa fa-arrow-right"></i> Agregar
                                    Producto
                                </button>
                                @error("cantidad")
                                <span class="text-error">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @error("id_productos.*")
                        <span class="alert-error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="btn btn-success" wire:click.prevent="guardarVenta()" type="submit"><i
                        class="fa fa-save"></i> Finalizar venta
                </div>
            </form>
        </div>
        <br>

        <hr>
        @if($productos_en_cola)
        <div class="ml-2 mb-2">
            <div class="card-columns">
                @foreach($productos_en_cola as $detalle)
                <div class="card" style="height: 150px">
                    <img src="/images/productos/{{$detalle->producto->imagen_url}}" class="card-img-top"
                        onclick="$('#callModalVistaPrevia{{$detalle->producto->id}}').click()"
                        onerror="this.src='/images/no_image.jpg'">


                    <div class="card-body">
                        <h5 class="card-title">{{$detalle->producto->nombre}}</h5>
                        <p class="card-text"><i class="fa fa-codepen"></i> {{$detalle->producto->nombre_categoria}}</p>
                        @if($detalle->producto->descripcion)
                        <p class="card-text"><strong>Descripcion:</strong> {{$detalle->descripcion}}</p>
                        @endif
                        <small class="text-muted"><i class="fa fa-dollar"></i> <strong>Cantidad:
                                # </strong> {{$detalle->cantidad}}</small>
                        <br>
                        <small class="text-muted"><i class="fa fa-money"></i> <strong>Costo venta:
                                Lps.</strong> {{$detalle->producto->costo_venta}}</small>

                        <br>
                        @if($producto->en_stock)
                        <small class="text-muted"><i class="fa fa-star"></i> <strong>En Stock:
                                #</strong> {{$detalle->producto->en_stock}}</small>
                        @else
                        <div class="alert alert-warning">
                            <small>Este producto no hay en stock</small>
                        </div>

                        @endif
                        <br>
                        <button class="btn btn-danger btn-sm"
                            wire:click.prevent="eliminarProductoCola({{$detalle->id}})">
                            <i class="fa fa-trash"></i></button>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        @else
        <div class="alert alert-info">Aún no se han agregado productos.</div>

        @endif
    </div>

</div>
@push("scripts")
<script>
    function closedWin() {
        confirm("¿Estas seguro que deseas salir y cancelar la venta?");
        return false; /* which will not allow to close the window */
    }
    if (window.addEventListener) {
        window.addEventListener("close", closedWin, false);
    }

    window.onclose = closedWin;
</script>
@endpush
