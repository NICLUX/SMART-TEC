@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
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


    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
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

                                <form  id="form_proveedores" enctype="multipart/form-data" action="{{route("cliente.store")}}"
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
                                        <label>Ingrese la direccion:</label>
                                        <input class="form-control @error('direccion') is-invalid @enderror"
                                               placeholder="Direccion exacta"
                                               required
                                               value="{{old("direccion")}}"
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
                                               value="{{old("telefono")}}"
                                               maxlength="8"
                                               type="number"
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
            </div>
        </div>
    </div>
@endsection
