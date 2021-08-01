@extends("layouts.formulario")
@section("contenido")

    <h1>SMARTEC</h1>
    <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("usuarios.index")}}">Cancelar</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">EDITAR USUARIO</h1>
                <div class="row register-form">
                    <div class="col-md-6">

                        <form id="form_proveedores" enctype="multipart/form-data"
                              action="{{route("usuarios.update",['id'=>$user->id])}}"
                              method="post" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf

                            <input type="text" id="is_admin" name="is_admin" value="{{$user->is_admin}}"
                                   style="display: none">

                            <div class="form-group col-md-11">
                                <label>Nombre:</label>
                                <input type="text"
                                       pattern="^[A-Za-záéíóú \s]{2,50}"
                                       title="Debe ingresar un nombre valido, ejemplo: Daniela Martinez"
                                       maxlength="50"
                                       required
                                       onkeypress="return valideLetter(event);"
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

                            <div class="form-group col-md-11">
                                <label>Usuario:</label>
                                <input type="text"
                                       pattern="[a-z-]{2,20}"
                                       title="Debe ingresar un usuario valido, ejemplo: daniela-martinez"
                                       maxlength="20"
                                       required
                                       @if(old("usuario"))
                                       value="{{old("usuario")}}"
                                       @else
                                       value="{{$user->usuario}}"
                                       @endif
                                       name="usuario"
                                       class="form-control  @error('usuario') is-invalid @enderror">
                                <small class="text-muted">Máxima longitud 20 caracteres (Solo acepta minúsculas y para
                                    separar el simbolo -)</small>
                                @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-11">
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
                                    class="form-control  @error('telefono') is-invalid @enderror">
                                <small class="text-muted">Máxima longitud 8 caracteres</small>
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-11">
                                <label for="id_proveedor">Tipo de usuario</label>
                                <div class="input-group">
                                    <select id="is_admin"
                                            name="is_admin"
                                            class="form-control @error('is_admin') is-invalid @enderror" required
                                            @if (auth()->user()->is_admin == $user->is_admin)
                                            disabled
                                        @endif>
                                        <option value="" selected>Seleccione una opción</option>


                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}" @if($user->is_admin)
                                            value="{{$user->is_admins}}"
                                                {{$user->is_admin == $tipo->id ? 'selected="selected"':''}}
                                                @endif
                                            @if(old("is_admin"))
                                                {{old("is_admin") == $tipo->id ? 'selected="selected"':''}}
                                                @endif
                                            >{{$tipo->tipo_users}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('is_admin')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-11">
                                <label>Correo electrónico:</label>
                                <input type="email"
                                       id="email"
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
                            <br>
                            <div class="form-group col-md-11">
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
                            <hr>
                            <div class="form-group col-md-11">
                                <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

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
                        } else if(code>=65 && code<=122) {
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
