@extends("layouts.formulario")
@section("contenido")
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
                                               placeholder="Nombre"
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
                                                  placeholder="Descripción"
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
                                                  placeholder="Dirección exacta"
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
                                               placeholder="XXXX-XXXX"
                                               required
                                               maxlength="8"
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
                                               placeholder="Correo Electronico"
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
