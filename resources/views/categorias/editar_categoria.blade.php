@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
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


    <div class="container register " id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <a id="btn-cancelar" class="btn btn-primary btn-round"
                   href="{{route("categorias.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">

                <div class="row register-form">
                    <form method="post" action="{{route("categoria.update",['id'=>$categoria->id])}}"
                          enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label>Ingrese el nombre:</label>
                            <input type="text" maxlength="80"
                                   required
                                   @if(old("nombre"))
                                   value="{{old("nombre")}}"
                                   @else
                                   value="{{$categoria->nombre}}"
                                   @endif
                                   name="nombre"
                                   class="form-control  @error('nombre') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 80 caracteres</small>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- Para ingresar una imagen -->
                        <div class="row">
                            <div class="col-2">
                                <img
                                        id="imagen_previa" src="/images/categorias/{{$categoria->imagen}}"
                                        onerror="this.src='/images/no_image.jpg'">
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Seleccione una imagen (opcional):</label>
                                    <input class="form-control  @error('imagen') is-invalid @enderror"
                                           accept="image/*"
                                           name="imagen_url"
                                           onchange="verImagen(event)"
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
                        <button id="btnRegister" type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                            Guardar
                        </button>
                        <!-- -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Permite mostrar la imagen seleccionada
        var verImagen = function (event) {
            var image = document.getElementById('imagen_previa');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection

