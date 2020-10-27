@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Cliente</h3>
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
            <form enctype="multipart/form-data" action="{{route("cliente.update",["id"=>$cliente->id])}}"
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
                           value="{{$cliente->nombre}}"
                           @endif
                           maxlength="80" name="nombre">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Ingrese la direccion:</label>
                    <input class="form-control @error('direccion') is-invalid @enderror"
                           @if(old("direccion"))
                           {{old("direccion")}}
                           @else
                           value=" {{$cliente->direccion}}"
                           @endif
                           required
                           maxlength="80" name="direccion">

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
                           @if(old("telefono"))
                           value="{{old("telefono")}}"
                           @else
                           value="{{$cliente->telefono}}"
                           @endif
                           maxlength="8"
                           name="telefono">
                    @error('telefono')
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
