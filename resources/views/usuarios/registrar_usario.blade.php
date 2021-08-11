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

    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("usuarios.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">AGREGAR USUARIO</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_proveedores" enctype="multipart/form-data"
                                       action="{{route("usuarios.store")}}"
                                       method="post" style="width: 550px">
                                    @csrf
                                    <div class="form-group" >
                                        <label for="name">Nombre:</label>
                                        <input type="text"
                                               pattern="^[A-Za-záéíóú \s]{2,50}"
                                               title="Debe ingresar un nombre valido, ejemplo: Daniela Martinez"
                                               id="name"
                                               onkeypress="return valideLetter(event);"
                                               value="{{old("name")}}"
                                               maxlength="50"
                                               required
                                               placeholder=""
                                               name="name" class="form-control  @error('name') is-invalid @enderror">
                                        <small class="text-muted">Máxima longitud 50 caracteres</small>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Usuario:</label>
                                        <input type="text"
                                               pattern="[a-z-]{2,20}"
                                               title="Debe ingresar un usuario valido, ejemplo: daniela-martinez"
                                               maxlength="20"
                                               onkeypress="return valideUser(event);"
                                               required
                                               value="{{old("usuario")}}"
                                               id="usuario"  class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                               placeholder="">
                                        <small class="text-muted">Máxima longitud 20 caracteres</small>
                                        @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message}}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="id_proveedor">Tipo de usuario</label>
                                        <div class="input-group">
                                            <select id="is_admin"
                                                    name="is_admin"
                                                    class="form-control @error('is_admin') is-invalid @enderror" required>
                                                <option selected>Seleccione una opción</option>
                                                @foreach($tipos as $tipo)
                                                    <option value="{{$tipo->id}}">{{$tipo->tipo_users}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_compra">Teléfono:</label>
                                        <input class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                               pattern="[0-9]{8}"
                                               title="Debe ingresar un número de teléfono valido, ejemplo: 99769965"
                                               maxlength="8"
                                               onkeypress="return valideKey(event);"
                                               id="telefono"
                                               type="tel"
                                               required
                                               value="{{old("telefono")}}"
                                               placeholder="">
                                        <small class="text-muted">Máxima longitud 8 caracteres</small>
                                        @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_compra">Correo electrónico:</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                               id="email"
                                               type="email"
                                               title="Debe ingresar una dirección de correo electronico valida, ejemplo: smar-tec@gmail.com"
                                               value="{{old("email")}}"
                                               required
                                               placeholder="" maxlength="50">
                                        <small class="text-muted">Máxima longitud 50 caracteres</small>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_compra">Contraseña :</label>
                                    </div>
                                    <div class="input-group">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                               pattern="[A-Za-z0-9.-$ ]{8,15}"
                                               title="Debe ingresar una contraseña valida, puede incluir mayusculas, minusculas, números, y los simbolos (. - $) "
                                               id="password"
                                               type="password"
                                               minlength="8"
                                               min="8"
                                               required
                                               placeholder=""
                                               value="password" ><div class="input-group-append">
                                            <button id="show_password" class="btn btn-outline-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
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
                                    <div class="items-center justify-end mt-4">
                                        <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function mostrarPassword(){
            var cambio = document.getElementById("password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        function valideKey(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==8) {
                return true;
            } else if(code>=48 && code<=57) {
                return true;
            } else{
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

        function valideUser(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==45) {
                return true;
            } else if(code>=97 && code<=122) {
                return true;
            } else{
                return false;
            }
        }

        function validar() {
            let isValid = false;
            var v_figura = document.getElementById('name').value;
            const pattern = new RegExp("^[a-zA-Z ]*$");
            if (pattern.test(v_figura)) {
            } else {
                toastr.options =
                    {
                        "closeButton": true,
                        "progressBar": true
                    }
                toastr.error("El nombre no puede incluir números");
                event.preventDefault();
            }
        }
    </script>
@endsection
