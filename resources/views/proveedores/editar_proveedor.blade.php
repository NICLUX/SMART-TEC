@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Proveedor</h3>
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
            <form enctype="multipart/form-data"
                  action="{{route("proveedor.update",["id"=>$proveedor->id])}}"
                  method="post">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label>Ingrese el nombre:</label>
                    <input class="form-control  @error('nombre') is-invalid @enderror"
                           placeholder="Nombre"
                           required
                           @if(old("nombre"))
                           value="{{old("nombre")}}"
                           @else
                           value="{{$proveedor->nombre}}"
                           @endif
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
                          @if(old("descripcion"))
                            {{old("descripcion")}}
                        @else
                            {{$proveedor->descripcion}}
                        @endif
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
                          @if(old("direccion"))
                            {{old("direccion")}}
                        @else
                            {{$proveedor->direccion}}
                        @endif
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
                           @if(old("direccion"))
                           value="{{old("telefono")}}"
                           @else
                           value="{{$proveedor->telefono}}"
                           @endif
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
                           @if(old("email"))
                           value="{{old("email")}}"
                           @else
                           value="{{$proveedor->email}}"
                           @endif
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
