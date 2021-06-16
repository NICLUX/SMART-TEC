@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")
    <!---Alerta y envia mensajes al proveedor cuando hay un error o se registran -->
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
                <a id="btn-cancelar" class="btn btn-primary btn-round"
                   href="{{route("proveedores.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">REGISTRAR PROVEEDOR</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form id="form_proveedores" name="form_proveedores" enctype="multipart/form-data"
                                      action="{{route("proveedor.store")}}"
                                      method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label>Ingrese el nombre:</label>
                                        <input class="form-control  @error('nombre') is-invalid @enderror"
                                               required
                                               value="{{old("nombre")}}"
                                               name="nombre"
                                               id="nombre">
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ingrese la descripción (opcional):</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                  maxlength="80" name="descripcion">{{old("descripcion")}}</textarea>
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ingrese la direccion:</label>
                                        <textarea class="form-control @error('direccion') is-invalid @enderror"
                                                  required
                                                  maxlength="80" name="direccion">{{old("direccion")}}</textarea>
                                        @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ingrese el télefono:</label>
                                        <input class="form-control @error('telefono') is-invalid @enderror"
                                               type="tel"
                                               pattern='\d{8}'
                                               required
                                               value="{{old("telefono")}}"
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
                                               type="email"
                                               value="{{old("email")}}"
                                               maxlength="100"
                                               name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button id="btnRegister" onclick="validar()" class="btn btn-success">Guardar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                        <script>
                            function validar() {
                                let isValid = false;
                                var v_figura = document.getElementById('nombre').value;
                                const pattern = new RegExp("^[a-zA-Z ]*$");
                                if (pattern.test(v_figura)) {
                                } else {
                                    toastr.options =
                                        {
                                            "closeButton": true,
                                            "progressBar": true
                                        }
                                    toastr.error("El nombre no puede incluir números");
                                    event.preventDefault();
                                }
                            }
                        </script>
@endsection
