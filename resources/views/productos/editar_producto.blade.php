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

            <form action="{{route("producto.update",["id"=>$producto->id])}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="nombre">Ingrese el nombre:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                           id="nombre"
                           @if(old("nombre"))
                           value="{{old("nombre")}}"
                           @else
                           value="{{$producto->nombre}}"
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
                              id="nombre"
                              required
                              placeholder="Ingrese la descripcion" maxlength="80">
                         @if(old("descripcion"))
                            {{old("descripcion")}}
                        @else
                            {{$producto->descripcion}}
                        @endif
                    </textarea>
                    @error('descripcion')
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
                           value="{{$producto->costo_compra}}"
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
                    <label for="costo_venta">Ingrese el costo de la venta:</label>
                    <input class="form-control @error('costo_venta') is-invalid @enderror" name="costo_venta"
                           id="costo_venta"
                           @if(old("costo_venta"))
                           value="{{old("costo_venta")}}"
                           @else
                           value="{{$producto->costo_venta}}"
                           @endif
                           type="number"
                           min="0"
                           required
                           placeholder="Ingrese el costo venta" maxlength="80">
                    @error('costo_venta')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="id_categoria">Seleccione una categoria</label>
                    <div class="input-group">
                        <select id="id_categoria"
                                name="id_categoria"
                                class="form-control @error('id_categoria') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}"
                                @if($producto->id_categoria)
                                    {{$producto->id_categoria == $categoria->id ? 'selected="selected"':''}}
                                        @endif
                                >{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-outline-success" href="{{route("categoria.nueva")}}"
                               type="button"><i
                                        class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    @error('id_categoria')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <!-- Para ingresar una imagen -->
                <div class="row">
                    <div class="col-2">
                        <img id="imagen_previa" src="/images/productos/{{$producto->imagen_url}}"
                             onerror="this.src='/images/no_image.jpg'">
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Seleccione una imagen (opcional):</label>
                            <input class="form-control  @error('imagen') is-invalid @enderror"
                                   accept="image/*"
                                   name="imagen_url"
                                   onchange="verImagen(event)"
                                   id="imagen_url"
                                   type="file" placeholder="Ingrese una imagen"
                            >
                            <small class="text-muted">Solo formatos en imagen (.png,.jpg,.jpeg)</small>
                            @error('imagen')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
                <!-- -->
            </form>

        </div>
    </div>

    <script>
        //Permite mostrar la imagen seleccionada
        var verImagen = function(event) {
            var image = document.getElementById('imagen_previa');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endsection