@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")

    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <a id="btn-cancelar" class="btn btn-primary btn-round"
                   href="{{route("proveedores.index")}}">Cancelar</a>
            </div>

            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">EDITAR PROVEEDOR</h1>
                        <div class="row register-form">

                                <form id="form_proveedores" enctype="multipart/form-data"
                                      action="{{route("proveedor.update",["id"=>$proveedor->id])}}" method="post">
                                    @method("PUT")
                                    @csrf

                                    <div class="form-group col-md-11">
                                        <label>Nombre:</label>
                                        <input class="form-control  @error('nombre') is-invalid @enderror" type="text"
                                               pattern="[A-Za-z. ]{2,50}"
                                               required
                                               maxlength="50"
                                               @if(old("nombre"))
                                               value="{{old("nombre")}}" @else value="{{$proveedor->nombre}}" @endif
                                               id="nombre" name="nombre">
                                        <small class="text-muted">Máxima longitud 50 caracteres</small>
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-11">
                                        <label>Descripción (opcional):</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                  pattern="[A-Za-z ,.áéíóú°-_]{0,150}"
                                                  maxlength="150"
                                                  name="descripcion">@if(old("descripcion")){{old("descripcion")}}
                                            @else{{$proveedor->descripcion}}@endif</textarea>
                                        <small class="text-muted">Máxima longitud 150 caracteres</small>
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-11">
                                        <label>Dirección:</label>
                                        <textarea class="form-control @error('direccion') is-invalid @enderror" required
                                                  pattern="[A-Za-z ,.áéíóú°-_]{0,80}"
                                                  maxlength="80"
                                                  name="direccion">@if(old("direccion")){{old("direccion")}}
                                            @else{{$proveedor->direccion}}@endif</textarea>
                                        <small class="text-muted">Máxima longitud 80 caracteres</small>
                                        @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3" >
                                        <label>Télefono:</label>
                                        <input class="form-control @error('telefono') is-invalid @enderror" type="tel"
                                               pattern='\d{8}'
                                               required
                                               maxlength="8"
                                               minlength="8"
                                               @if(old("direccion")) value="{{old("telefono")}}" @else
                                               value="{{$proveedor->telefono}}" @endif
                                               name=" telefono">
                                        @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label>Correo electrónico:</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                               @if(old("email")) value="{{old("email")}}"
                                               @else value="{{$proveedor->email}}"
                                               @endif maxlength="50" required name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-11">
                                        <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
