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
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text"
                                       pattern="^[A-Za-záéíóú \s]{2,20}"
                                       title="Debe ingresar un nombre valido, ejemplo: Daniela Martinez"
                                       maxlength="20"
                                       required
                                       @if(old("name"))
                                       value="{{old("name")}}"
                                       @else
                                       value="{{$user->name}}"
                                       @endif
                                       name="name"
                                       class="form-control  @error('name') is-invalid @enderror">
                                <small class="text-muted">Máxima longitud 20 caracteres</small>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
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
                                <small class="text-muted">Máxima longitud 20 caracteres (Solo acepta minúsculas y para separar el simbolo -)</small>
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

                            <div class="form-group">
                                <label for="id_proveedor">Tipo de usuario</label>
                                <div class="input-group">
                                    <select id="is_admin"
                                            @if(old("is_admin"))
                                            value="{{old("is_admin")}}"
                                            @else
                                            value="{{$user->is_admin}}"
                                            @endif
                                            name="is_admin"
                                            class="form-control @error('is_admin') is-invalid @enderror" required>
                                        <option value="$user->is_admin" selected >Seleccione una opción</option>
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
                                <label>Correo electrónico:</label>
                                <input type="email"
                                       id="email"
                                       maxlength="25"
                                       required
                                       @if(old("email"))
                                       value="{{old("email")}}"
                                       @else
                                       value="{{$user-> email}}"
                                       @endif
                                       name="email"
                                       class="form-control  @error('email') is-invalid @enderror">
                                <small class="text-muted">Máxima longitud 25 caracteres</small>
                                @error('email')
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
                            <hr>
                            <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
@endsection
