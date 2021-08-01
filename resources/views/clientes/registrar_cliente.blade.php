@extends("layouts.formulario")
@section("contenido")
    <h1>SMARTEC</h1>
    <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("clientes.index")}}">Cancelar</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h1 class="register-heading">REGISTRAR CLIENTE</h1><br>
                <div class="row register-form">
                    <div class="col-md-6">

                        <form id="form_proveedores" enctype="multipart/form-data" action="{{route("cliente.store")}}"
                              method="post">
                            @csrf
                            <div class="form-group col-md-11">
                                <label>Nombre:</label>
                                <input class="form-control  @error('nombre') is-invalid @enderror"
                                       placeholder=""
                                       pattern="[A-Za-z. ]{2,50}"
                                       required
                                       value="{{old("nombre")}}"
                                       maxlength="50" name="nombre" id="nombre">
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
                                          name="direccion" placeholder="" id="direccion" maxlength="150"
                                       pattern="[A-Za-z,.áéíóú° ]{1,150}"
                                       title="Debe ingresar una dirección valido, ejemplo: Esto es una descripción."
                                       required>{{old("direccion")}}</textarea>
                                <small class="text-muted">Máxima longitud 150 caracteres</small>
                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-md-11">
                                <label>Télefono:</label>
                                <input class="form-control @error('telefono') is-invalid @enderror"
                                       placeholder=""
                                       type="tel"
                                       pattern='\d{8}'
                                       onkeypress="return valideKey(event);"
                                       required
                                       value="{{old("telefono")}}"
                                       maxlength="8"
                                       name="telefono">
                                <small class="text-muted">Máxima longitud 8 caracteres</small>
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>
                            <div class="form-group col-md-11">
                                <button id="btnRegister" onclick="validar()" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
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
                    toastr.error("No pueden ir números en el Nombre");
                    event.preventDefault();
                }
            }
        </script>
@endsection
