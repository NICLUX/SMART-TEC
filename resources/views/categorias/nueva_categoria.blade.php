@extends("layouts.main")
@extends("Servicios.mejora_vista")
@section("content")

    <div>


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
                    <p style="color: #fff3cd;">Registra nuevas categorias!</p>
                    <a id="btn-cancelar" class="btn btn-primary btn-round"
                       href="{{route("categorias.index")}}">Cancelar</a>
                </div>

                <div class="col-md-9 register-right">
                    <div class="row register-form">
                        <form method="post" action="{{route("categoria.store")}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Ingrese el nombre:</label>
                                <input type="text" maxlength="80"
                                       required
                                       value="{{old("nombre")}}"
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
                            <button id="btnRegister" type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                Guardar
                            </button>
                            <!-- -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
