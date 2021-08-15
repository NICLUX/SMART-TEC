<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <!--TODO validar que evite cerrar la ventana o ir hacia atras-->

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

    <div class="col">
        <ul class="list-group">
            <li class="list-group-item" style="background-color:#1c2d3f">
                <h2 style="color:#ffffff;">
                    CREAR VENTA
                    <a class="btn-sm btn-success float-right" href="{{route("ventas.index")}}"><i></i> Historial</a>
                </h2>
            </li>
        </ul>
    </div>

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
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
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
                            <span disabled="true" class="btn btn-sm btn-light">L.</span>
                            <input class="form-control" wire:model="total_venta" placeholder="Total venta" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="margin-right: 10px; border-radius: 5px" wire:ignore>
                    <label>Seleccione los productos:</label>
                    <div class="input-group">
                        <select class="form-control @error(" id_producto") is-invalid @endError" required
                                wire:model="id_producto" wire:model="productos" name="producto" id="selectProductos">
                            <option selected value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{$producto->id}}">
                                    <p style="font: caption"></p>{{$producto->nombre}}
                            @endforeach
                        </select>

                        <div class="input-group-prepend"
                             style="margin-right: 10px; margin-left: 10px; border-radius: 5px">
                            <input wire:model="cantidad" type="number" min="1" required
                                   placeholder="Ingrese la cantidad" class="form-control @error(" cantidad") is-invalid
                                    @endError">
                            <button class="btn btn-sm btn-dark" style="margin-left: 10px; border-radius: 5px"
                                    wire:click.prevent="agregarProducto()"><i
                                    class="fa fa-arrow-right"></i> Agregar Producto
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
            <div class="btn btn-success" style="border-radius: 5px" wire:click.prevent="guardarVenta()" type="submit"><i
                    class="fa fa-save"></i> Finalizar Venta
            </div>
        </form>
    </div>
    <br>
    <br>

    <hr>

    <div class="card">
        <div class="card-header">
            <div class="container">

                <div class="panel-body table-responsive" id="nuevo_table">

                    @if($productos_en_cola)
                        <div>

                            <table class="table">
                                <thead class="thead-dark">
                                <tr id="tabla">
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Categoria</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-center">Precio</th>
                                    <th scope="col" class="text-center">Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($productos_en_cola as $item=> $detalle)
                                    <tr id="resultados">
                                        <td scope="row" style="text-align: center">{{$detalle->producto->nombre}}</td>
                                        <td style="text-align: center">{{$detalle->producto->nombre_categoria}}</td>
                                        <td style="text-align: center">{{$detalle->cantidad}} unidades</td>
                                        <td style="text-align: center">L. {{$detalle->producto->costo_venta}}</td>
                                        <td style="text-align: center">
                                            <button class="btn btn-danger btn-sm"
                                                    wire:click.prevent="eliminarProductoCola({{$detalle->id}})">
                                                <i class="fa fa-trash"></i></button>

                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="alert alert-info">Aún no se han agregado productos.</div>
                            @endif
                        </div>

                </div>
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




