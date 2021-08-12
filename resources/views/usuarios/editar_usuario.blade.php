@extends('layouts.main')
@extends('servicios.mejora_vista')
@section("content")

    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("clientes.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form id="form_proveedores"
                                      method="post" action="{{route("usuarios.updatee",['id'=>$user->id])}}"
                                      enctype="multipart/form-data">
                                    @method("PUT")
                                    @csrf

                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input
                                            type="text"
                                            pattern="^[A-Za-záéíóú \s]{2,50}"
                                            title="Debe ingresar un nombre valido, ejemplo: Daniela Martinez"
                                            maxlength="50"
                                            onkeypress="return valideLetter(event);"
                                            required
                                            @if(old("name"))
                                            value="{{old("name")}}"
                                            @else
                                            value="{{$user->name}}"
                                            @endif
                                            name="name"
                                            class="form-control  @error('name') is-invalid @enderror">
                                        <small class="text-muted">Máxima longitud 50 caracteres</small>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Usuario:</label>
                                        <input
                                            type="text"
                                            pattern="[a-z-ñÑ]{2,20}"
                                            title="Debe ingresar un usuario valido, ejemplo: daniela-martinez"
                                            maxlength="20"
                                            onkeypress="return valideUser(event);"
                                            required
                                            @if(old("usuario"))
                                            value="{{old("usuario")}}"
                                            @else
                                            value="{{$user->usuario}}"
                                            @endif
                                            name="usuario"
                                            class="form-control  @error('usuario') is-invalid @enderror">
                                        <small class="text-muted">Máxima longitud 20 caracteres</small>
                                        @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <input
                                            type="tel"
                                            pattern="[0-9]{8}"
                                            title="Debe ingresar un número de teléfono valido, ejemplo: 99769965"
                                            maxlength="8"
                                            onkeypress="return valideKey(event);"
                                            required
                                            @if(old("telefono"))
                                            value="{{old("telefono")}}"
                                            @else
                                            value="{{$user->telefono}}"
                                            @endif
                                            name="telefono"
                                            class="form-control phone_mascara @error('telefono') is-invalid @enderror">
                                        <small class="text-muted">Máxima longitud 8 caracteres</small>
                                        @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Correo electrónico:</label>
                                        <input type="email"
                                               title="Debe ingresar una dirección de correo electronico valida, ejemplo: smar-tec@gmail.com"
                                               maxlength="50"
                                               required
                                               @if(old("email"))
                                               value="{{old("email")}}"
                                               @else
                                               value="{{$user-> email}}"
                                               @endif
                                               name="email"
                                               class="form-control  @error('email') is-invalid @enderror">
                                        <small class="text-muted">Máxima longitud 50 caracteres</small>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="form-group">
                                        <label>Seleccione una imagen (opcional):</label>
                                        <input class="form-control  @error('imagen') is-invalid @enderror"
                                               accept="image/*" name="imagen_url" type="file"
                                               placeholder="Ingrese una imagen">
                                        <small class="text-muted">Solo formatos en imagen (.png, .jpg, .jpeg)</small>
                                        @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div align="right">
                                        <button type="submit" class="alert btn-primary sm">Guardar</button>
                                        <a href="{{ route('profile.show') }}" type="button"
                                           class="alert btn-secondary sm">
                                            Cerrar</a>
                                    </div>


                                </form>

                                <script>
                                    function validar() {
                                        let isValid = false;
                                        var v_figura = document.getElementById('nombre').value;
                                        const pattern = new RegExp("^[a-zA-Z ]*$");
                                        if (pattern.test(v_figura)) {
                                        } else {
                                            toastr.options = {
                                                "closeButton": true,
                                                "progressBar": true
                                            }
                                            toastr.error("El nombre no puede incluir números");
                                            event.preventDefault();
                                        }
                                    }

                                    function valideKey(evt) {
                                        var code = (evt.which) ? evt.which : evt.keyCode;
                                        if (code == 8) {
                                            return true;
                                        } else if (code >= 48 && code <= 57) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }

                                    function valideLetter(evt){
                                        var code = (evt.which) ? evt.which : evt.keyCode;
                                        if(code==8 || code==32) {
                                            return true;
                                        } else if(code>=65) {
                                            return true;
                                        } else{
                                            return false;
                                        }
                                    }

                                    function valideUser(evt){
                                        var code = (evt.which) ? evt.which : evt.keyCode;
                                        if(code==45) {
                                            return true;
                                        } else if(code>=65) {
                                            return true;
                                        } else{
                                            return false;
                                        }
                                    }

                                    //Permite mostrar la imagen seleccionada
                                    var verImagen = function (event) {
                                        var image = document.getElementById('imagen_previa');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
@endsection
