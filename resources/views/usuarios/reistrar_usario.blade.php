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
                <p>Registra nuevos Usuario!</p>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("usuarios.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">Agregar Nuevo Usuario</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_proveedores" enctype="multipart/form-data" action="{{route("usuarios.store")}}"
                                       method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Ingrese el nombre:</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                               required
                                               placeholder="Ingrese el nombre" maxlength="80">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Ingrese el nombre de usuario:</label>
                                        <input id="usuario"  class="form-control @error('name') is-invalid @enderror" name="usuario"
                                               required
                                               placeholder="Ingrese el nombre de usuario" maxlength="80">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
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
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="costo_compra">Ingrese la Contraseña :</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                               id="password"
                                               type="password"
                                               min="8"
                                               required
                                               placeholder="Ingrese la Contraseña">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>                                    </div>
                                </form>
                            </div>
                        </div>
@endsection
