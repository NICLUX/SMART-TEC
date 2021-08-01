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


                        <div class="form-group col-md-11">
                            <label>Nombre:</label>
                            <input class="form-control  @error('nombre') is-invalid @enderror"
                                   placeholder=""
                                   pattern="[A-Za-z ]{2,50}"
                                   required
                                   maxlength="50"
                                   value="{{old("nombre")}}" name="nombre" id="nombre">
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
                                      pattern="[A-Za-z ,.áéíóú]{0,150}"
                                      maxlength="150"
                                      title="Debe ingresar una descripción valido, ejemplo: Esto es una descripción."
                                      placeholder="" name="descripcion">{{old("descripcion")}}</textarea>
                            <small class="text-muted">Máxima longitud 150 caracteres</small>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-11">
                            <label>Dirección:</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror"
                                      pattern="[A-Za-z,.áéíóú ]{1,150}"
                                      title="Debe ingresar una dirección valido, ejemplo: Esto es una descripción."
                                      placeholder="" required maxlength="150"
                                      name="direccion">{{old("direccion")}}</textarea>
                            <small class="text-muted">Máxima longitud 150 caracteres</small>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label>Télefono:</label>
                            <input class="form-control @error('telefono') is-invalid @enderror"
                                   placeholder=""
                                   pattern='\d{8}'
                                   onkeypress="return valideKey(event);"
                                   required
                                   maxlength="8"
                                   value="{{old("telefono")}}" name="telefono">
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-8">
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
                        <div class="form-group col-md-11">
                            <button id="btnRegister" onclick="validar()" class="btn btn-success">Guardar</button>
                        </div>
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

        function valideKey(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==8) {
                return true;
            } else if(code>=48 && code<=57) {
                return true;
            } else{
                return false;
            }
        }
    </script>
@endsection
