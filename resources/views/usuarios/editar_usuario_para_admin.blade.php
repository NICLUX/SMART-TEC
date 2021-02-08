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
                <p>Editar Usuario!</p>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("usuarios.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">Editar Datos Usuario</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_proveedores" enctype="multipart/form-data" action="{{route("usuarios.update",['id'=>$user->id])}}"
                                       enctype="multipart/form-data">
                                    @method("PUT")
                                    @csrf
                                    <div class="form-group">
                                        <label>Ingrese el nombre:</label>
                                        <input type="text" maxlength="80"
                                               required
                                               @if(old("name"))
                                               value="{{old("name")}}"
                                               @else
                                               value="{{$user->name}}"
                                               @endif
                                               name="name"
                                               class="form-control  @error('name') is-invalid @enderror">
                                        <small class="text-muted">Maxima longitud 100 caracteres</small>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Ingrese el nombre de usuario:</label>
                                        <input type="text" maxlength="80"
                                               required
                                               @if(old("usuario"))
                                               value="{{old("usuario")}}"
                                               @else
                                               value="{{$user->usuario}}"
                                               @endif
                                               name="usuario"
                                               class="form-control  @error('usuario') is-invalid @enderror">
                                        <small class="text-muted">Maxima longitud 100 caracteres</small>
                                        @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ingrese el numero de Telefono:</label>
                                        <input type="number" maxlength="80"
                                               required
                                               @if(old("telefono"))
                                               value="{{old("telefono")}}"
                                               @else
                                               value="{{$user->telefono}}"
                                               @endif
                                               name="telefono"
                                               class="form-control  @error('telefono') is-invalid @enderror">
                                        <small class="text-muted">Maxima longitud 8 caracteres</small>
                                        @error('telefono')
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
                                        <label>Ingrese el numero de Email:</label>
                                        <input type="email" maxlength="80"
                                               required
                                               @if(old("email"))
                                               value="{{old("email")}}"
                                               @else
                                               value="{{$user-> email}}"
                                               @endif
                                               name="email"
                                               class="form-control  @error('email') is-invalid @enderror">
                                        <small class="text-muted">Maxima longitud 80 caracteres</small>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <hr>
                                    <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                                    <!-- -->

                                </form>
                            </div>
                        </div>
@endsection
