@extends('layouts.main')
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Usuario</h3>
        </div>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("usuarios.index")}}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
                </ol>
            </nav>

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
            <div class="card card-body">
                <div class="container-fluid">
                    <form method="post" action="{{route("usuarios.update",['id'=>$user->id])}}"
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
                            <small class="text-muted">Maxima longitud 100 caracteres</small>
                            @error('telefono')
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
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <!-- -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
