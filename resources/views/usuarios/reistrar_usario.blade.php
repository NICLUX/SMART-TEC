@extends("layouts.formulario")
@section("contenido")
    <h1>SMARTEC</h1>
    <p>Registra nuevos Usuario!</p>
    <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("usuarios.index")}}">Cancelar</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">Agregar Nuevo Usuario</h1>
                <div class="row register-form">
                    <div class="col-md-6">

                        <form  id="form_proveedores" enctype="multipart/form-data"
                               action="{{route("usuarios.store")}}"
                               method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Ingrese el nombre:</label>
                                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                required placeholder="Ingrese el nombre" maxlength="80">
                                <small class="text-muted">Maxima longitud 100 caracteres</small>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Ingrese el nombre de usuario:</label>
                                <input id="usuario"  class="form-control @error('usuario') is-invalid @enderror" name="usuario"
                                       required
                                       placeholder="Ingrese el nombre de usuario" maxlength="80">
                                <small class="text-muted">Maxima longitud 80 caracteres</small>
                                @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_proveedor">Seleccione el tipo de usuario</label>
                                <div class="input-group">
                                    <select id="is_admin"
                                            name="is_admin"
                                            class="form-control @error('is_admin') is-invalid @enderror" required>
                                        <option value="" selected disabled>Seleccione una opcion</option>
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
                                <label for="costo_compra">Ingrese el telefono:</label>
                                <input class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                       id="telefono"
                                       type="number"
                                       min="0"
                                       required
                                       placeholder="Ingrese el telefono" maxlength="80">
                                <small class="text-muted">Maxima longitud 8 caracteres</small>
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="costo_compra">Ingrese el email:</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                       id="email"
                                       type="email"
                                       min="0"
                                       required
                                       placeholder="Ingrese el email" maxlength="80">
                                <small class="text-muted">Maxima longitud 80 caracteres</small>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_categoria">Ingrese la Contraseña :</label>
                                <div class=" form-control">
                                    <input class="from-group @error('password') is-invalid @enderror" name="password"
                                           id="password"
                                           type="password"
                                           min="8"
                                           required
                                           placeholder="Ingrese la Contraseña"
                                           value="password" ><a id="show_password" class="btn-outline-success float-right"
                                       type="button" onclick="mostrarPassword()">
                                        <span class="fa fa-eye-slash icon"></span> </a>
                                </div>
                                <small class="text-muted">Maxima longitud 8 caracteres</small>
                                @error('password')
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
  </script>
@endsection
