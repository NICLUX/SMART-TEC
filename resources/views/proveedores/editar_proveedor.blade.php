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
                            <div class="col-md-6">

                                <form id="form_proveedores" enctype="multipart/form-data"
                                      action="{{route("proveedor.update",["id"=>$proveedor->id])}}"
                                      method="post">
                                    @method("PUT")
                                    @csrf

                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input class="form-control  @error('nombre') is-invalid @enderror"
                                               type="text"
                                               pattern="[A-Za-z ]{2,20}"
                                               required
                                               maxlength="20"
                                               @if(old("nombre"))
                                               value="{{old("nombre")}}"
                                               @else
                                               value="{{$proveedor->nombre}}"
                                               @endif
                                               id="nombre"
                                               name="nombre">
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción (opcional):</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                  maxlength="40"
                                                  name="descripcion">@if(old("descripcion")){{old("descripcion")}}
                                            @else{{$proveedor->descripcion}}@endif</textarea>
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Dirección:</label>
                                        <textarea class="form-control @error('direccion') is-invalid @enderror"
                                                  required
                                                  maxlength="40"
                                                  name="direccion">@if(old("direccion")){{old("direccion")}}
                                            @else{{$proveedor->direccion}}@endif</textarea>
                                        @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Télefono:</label>
                                        <input class="form-control @error('telefono') is-invalid @enderror"
                                               type="tel"
                                               pattern='\d{8}'
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
                                        <label>Correo electrónico:</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                               type="email"
                                               @if(old("email"))
                                               value="{{old("email")}}"
                                               @else
                                               value="{{$proveedor->email}}"
                                               @endif
                                               maxlength="25"
                                               required
                                               name="email">
                                        @error('email')
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

