@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Proveedor</h3>
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
            <form enctype="multipart/form-data" action="{{route("proveedor.store")}}"
            method="post">
                @csrf
                <div class="form-group">
                    <label>Ingrese el nombre:</label>
                    <input class="form-control  @error('nombre') is-invalid @enderror"
                           placeholder="Nombre"
                           required
                           value="{{old("nombre")}}"
                           maxlength="80" name="nombre">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ingrese la descripción (opcional):</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                              placeholder="Direccion exacta"
                              maxlength="80" name="descripcion">
                        {{old("descripcion")}}
                    </textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ingrese la direccion:</label>
                    <textarea class="form-control @error('direccion') is-invalid @enderror"
                           placeholder="Direccion exacta"
                              required
                           maxlength="80" name="direccion">
                        {{old("direccion")}}
                    </textarea>
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ingrese el télefono:</label>
                    <input class="form-control @error('telefono') is-invalid @enderror"
                           placeholder="Télefono"
                           required
                           value="{{old("telefono")}}"
                           maxlength="8"
                           name="telefono">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ingrese el correo (opcional):</label>
                    <input class="form-control @error('email') is-invalid @enderror"
                           placeholder="Correo Electronico"
                           type="email"
                           value="{{old("email")}}"
                           maxlength="8"
                           name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
@endsection
