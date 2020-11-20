@extends("layouts.main")
@section("content")
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nuevo Inventario</h3>
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

                <form action="{{route("inventario.store")}}" enctype="multipart/form-data"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Seleccione el producto:</label>
                        <select class="select2 form-control @error('id_producto') is-invalid @enderror"
                                name="id_producto"
                                id="selectProducto" required>
                            <option disabled selected>Seleccione una opcion</option>
                            @foreach($productos as $producto)
                                <option value="{{$producto->id}}"
                                @if(old("id_producto"))
                                    {{old("id_producto") == $producto->id ? 'selected="selected"':''}}
                                        @endif>{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                        @error('id_producto')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ingrese la cantidad en Stock</label>
                        <input class="form-control @error('cantidad') is-invalid @enderror"
                               name="cantidad"
                               required
                               value="{{old("cantidad")}}"
                               placeholder="Cantidad en stock"
                               type="number" min="0">
                        @error('id_producto')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit"
                            class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection