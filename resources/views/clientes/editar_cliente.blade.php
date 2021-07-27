@extends('layouts.formulario')
@extends("servicios.mejora_vista")
@section('contenido')

    <h1>SMARTEC</h1>
    <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("clientes.index")}}">Cancelar</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">EDITAR CLIENTE</h1><br>
                <div class="row register-form">
                    <div class="col-md-6">

                        <form id="form_proveedores" enctype="multipart/form-data"
                              action="{{route("cliente.update",["id"=>$cliente->id])}}"
                              method="post">
                            @method("PUT")
                            @csrf

                            <div class="form-group col-md-11">
                                <label>Nombre:</label>
                                <input class="form-control  @error('nombre') is-invalid @enderror"
                                       type="text"
                                       pattern="[A-Za-z. ]{2,50}"
                                       maxlength="50"
                                       required
                                       placeholder=""
                                       @if(old("nombre"))
                                       value="{{old("nombre")}}"
                                       @else
                                       value="{{$cliente->nombre}}"
                                       @endif
                                       name="nombre">
                                <small class="text-muted">Máxima longitud 50 caracteres</small>
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-11">
                                <label>Dirección:</label>
                                <textarea class="form-control @error('direccion') is-invalid @enderror"
                                          placeholder="Dirección"
                                          required
                                          maxlength="80"
                                          name="direccion">@if(old("direccion")){{old("direccion")}}
                                    @else{{$cliente->direccion}}@endif</textarea>
                                <small class="text-muted">Máxima longitud 80 caracteres</small>
                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-11">
                                <label>Teléfono:</label>
                                <input
                                    type="tel"
                                    pattern='\d{8}'
                                    required
                                    maxlength="8"
                                    @if(old("telefono"))
                                    value="{{old("telefono")}}"
                                    @else
                                    value="{{$cliente->telefono}}"
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

                            <br>
                            <div class="form-group col-md-11">
                                <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

