@extends("layouts.formulario")
@section("contenido")
    <h1>SMARTEC</h1>
    <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("proveedores.index")}}">Cancelar</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">REGISTRAR PROVEEDOR</h1>

                <div class="row register-form">


                    <form id="form_proveedores" name="form_proveedores" enctype="multipart/form-data"
                          action="{{route("proveedor.store")}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label>Nombre:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input class="form-control  @error('nombre') is-invalid @enderror"
                                       placeholder=""
                                       pattern="[A-Za-z ]{2,50}"
                                       required
                                       maxlength="50"
                                       value="{{old("nombre")}}" name="nombre" id="nombre">
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descripción (opcional):</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                      pattern="[A-Za-z ,.áéíóú]{0,150}"
                                      maxlength="150"
                                      title="Debe ingresar una descripción valido, ejemplo: Esto es una descripción."
                                      placeholder="" name="descripcion">{{old("descripcion")}}</textarea>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Dirección:</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror"
                                      pattern="[A-Za-z,.áéíóú ]{1,50}"
                                      title="Debe ingresar una dirección valido, ejemplo: Esto es una descripción."
                                      placeholder="" required maxlength="40"
                                      name="direccion">{{old("direccion")}}</textarea>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Télefono:</label>
                            <input class="form-control @error('telefono') is-invalid @enderror"
                                   placeholder=""
                                   pattern='\d{8}'
                                   required
                                   maxlength="8"
                                   value="{{old("telefono")}}" name="telefono">
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="" id="email"
                                   type="email" value="{{old("email")}}" maxlength="50" required name="email">
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
    </div>
    <script>
        function validar() {
            let isValid = false;
            var v_figura = document.getElementById('nombre').value;
            const pattern = new RegExp("^[a-zA-Z ]*$");
            if (pattern.test(v_figura)) {
            } else {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("El nombre no puede incluir números");
                event.preventDefault();
            }
        }
    </script>
@endsection
