<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear venta</h3>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="guardarVenta">
                <div class="row">
                    <div class="col" wire:ignore>
                        <div class="form-group">
                            <label>Seleccione el cliente:</label>
                            <select wire:model="id_cliente"
                                    required
                                    class="form-control  @error("id_cliente") is-invalid @endError" id="selectCliente"
                            >
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
                            <input class="form-control @error("fecha_venta") is-invalid @endError"
                                   wire:model="fecha_venta" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Total Venta</label>
                            <div class="input-group-prepend">
                                <span disabled="true" class="btn btn-sm btn-light">Lps.</span>
                                <input class="form-control" wire:model="total_venta"
                                       placeholder="Total venta" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col" wire:ignore>
                        <label>Seleccione los productos:</label>
                        <select class="form-control @error("id_productos.*") is-invalid @endError"
                                required
                                name="producto"
                                multiple="multiple"
                                id="selectProductos">
                            @foreach($productos as$producto)
                                <option value="{{$producto->id}}">{{$producto->nombre}}
                                    || {{$producto->nombre_categoria}}</option>
                            @endforeach
                        </select>
                        @error("id_productos.*")
                        <span class="alert-error">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@push("scripts")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $("#selectCliente").select2({
                    theme: "classic",
                    placeholder: "Seleccione una opción",
                    allowClear: true
                });
                $("#selectCliente").on("change", function (e) {
                @this.set("id_cliente", e.target.value);
                })
                $("#selectProductos").select2({
                    theme: "classic",
                    multiple: true,
                    placeholder: "Seleccione una opción",
                    allowClear: true,
                    //templateFormat:productosImg(),

                });
                $("#selectProductos").on("change", function (e) {
                @this.set("id_productos", e.target.value);
                })
            });
        });

        //TODO crear seleccionar varios productos
        function productosImg(producto) {
            if (!producto.id) {
                return producto.nombre;
            }
            var baseUrl = "/iamges/productos/";
            var $producto = $(
                '<span><img src="' + baseUrl + '/' + producto.element.value.toLowerCase() + '" class="img-flag" /> ' + producto.nombre_categoria + '</span>'
            );
            return $producto;
        }

    </script>
@endpush
