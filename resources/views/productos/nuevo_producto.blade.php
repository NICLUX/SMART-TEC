@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Producto</h3>
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

            <form>
                <div class="form-group">
                    <label for="nombre">Ingrese el nombre:</label>
                    <input class="form-control" name="nombre"
                           id="nombre"
                           required
                           placeholder="Ingrese el nombre" maxlength="80">
                </div>
                <div class="form-group">
                    <label for="descripcion">Ingrese la descripcion:</label>
                    <textarea class="form-control" name="descripcion"
                              id="nombre"
                              required
                              placeholder="Ingrese la descripcion" maxlength="80">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="costo_compra">Ingrese el costo de la compra:</label>
                    <input class="form-control" name="costo_compra"
                           id="costo_compra"
                           type="number"
                           min="0"
                           required
                           placeholder="Ingrese el costo compra" maxlength="80">
                </div>
                <div class="form-group">
                    <label for="costo_venta">Ingrese el costo de la venta:</label>
                    <input class="form-control" name="costo_compra"
                           id="costo_venta"
                           type="number"
                           min="0"
                           required
                           placeholder="Ingrese el costo venta" maxlength="80">
                </div>

                <div class="form-group">
                    <label for="id_categoria">Seleccione una categoria</label>
                    <select id="id_categoria"
                            name="id_categoria"
                            class="form-control" required>
                        <option value="" selected disabled>Seleccione una opcion</option>
                        @foreach($categorias as $categoria)
                            <option>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Para ingresar una imagen -->
                <div class="form-group">
                    <label>Seleccione una imagen (opcional):</label>
                    <input class="form-control  @error('imagen') is-invalid @enderror"
                           accept="image/*"
                           name="imagen_url"
                           type="file" placeholder="Ingrese una imagen"
                    >
                    <small class="text-muted">Solo formatos en imagen (.png,.jpg,.jpeg)</small>
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <!-- -->
            </form>

        </div>
    </div>

@endsection