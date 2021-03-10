@extends("layouts.main")
@extends("Servicios.mejora_vista")
@section("content")
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


    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <p>Registra nuevos proveedores!</p>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("proveedores.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">Agregar Nuevo Proveedor</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_proveedores" enctype="multipart/form-data"   action="{{route("proveedor.update",["id"=>$proveedor->id])}}"
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
                              maxlength="80" name="descripcion">@if(old("descripcion")){{old("descripcion")}}
                        @else{{$proveedor->descripcion}}@endif</textarea>
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
                              maxlength="80" name="direccion">@if(old("direccion")){{old("direccion")}}
                        @else{{$proveedor->direccion}}@endif</textarea>
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
                           maxlength="100"
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
