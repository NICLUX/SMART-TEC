@extends('layouts.formulario')
@section('contenido')
<h1>SMARTEC</h1>
<p>Registra nuevos cliente!</p>
<a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("clientes.index")}}">Cancelar</a>
</div>
<div class="col-md-9 register-right">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h1 class="register-heading">Agregar Nuevo Cliente</h1><br>
            <div class="row register-form">
                <div class="col-md-6">

                    <form  id="form_proveedores" enctype="multipart/form-data" action="{{route("cliente.update",["id"=>$cliente->id])}}"
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
                                   type="number"
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
                        <br>
                        <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
