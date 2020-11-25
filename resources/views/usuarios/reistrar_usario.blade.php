@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nueva compra</h3>
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
            <form action="{{route("usuarios.store")}}" method="post" enctype="multipart/form-data">
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
                    <label for="descripcion">Ingrese tipo de usuario:</label>
                    <input type="number" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin"
                              id="is_admin"
                              placeholder="Ingrese el tipo de usuario"  required>
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
                <div class="form-group">
                    <label for="costo_compra">Comfirme la Contraseña :</label>
                    <input class="form-control @error('password_confirme') is-invalid @enderror" name="password_confirme"
                           id="password_confirme"
                           type="password"
                           min="8"
                           required
                           placeholder="Comfirme la Contraseña">
                    @error('password_confirme')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('login') }}">
                        {{ __('¿Ya registrado?') }}
                    </a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                </div>
                <!-- -->
            </form>
        </div>
    </div>
@endsection