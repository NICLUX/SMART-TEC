@extends("layouts.main")
@extends("servicios.mejora_vista")
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
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("servicios.index")}}">Cancelar</a>
            </div>

            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">EDITAR SERVICIO</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form action="{{route("servicios.update",["id"=>$servicioo->id])}}"
                                      id="form_proveedores" enctype="multipart/form-data"
                                      method="POST">
                                    @method("PUT")
                                    @csrf

                                    <div class="form-group">
                                        <label for="nombre">Ingrese el nombre:</label>
                                        <input class="form-control @error('nombre') is-invalid @enderror"
                                               name="nombre"
                                               id="nombre"
                                               maxlength="80"
                                               pattern="[A-Za-z,.áéíóú ]{1,80}"
                                               onkeypress="return valideLetter(event);"
                                               @if(old("nombre"))
                                               value="{{old("nombre")}}"
                                               @else
                                               value="{{$servicioo->nombre}}"
                                               @endif
                                               required>
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="id_categoria">Seleccione una categoria</label>
                                        <div class="input-group">
                                            <select id="id_categoria"
                                                    name="id_categoria"
                                                    class="form-control @error('id_categoria') is-invalid @enderror"
                                                    required>
                                                <option value="" selected disabled></option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}"
                                                    @if($servicioo->id_categoria)
                                                        {{$servicioo->id_categoria == $categoria->id ? 'selected="selected"':''}}
                                                        @endif
                                                    >{{$categoria->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <a class="btn btn-outline-success" href="{{route("categorias.crear")}}"
                                                   type="button"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                        @error('id_categoria')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                        <div class="form-group">
                                            <label>Ingrese la descripción:</label>
                                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                      required
                                                      maxlength="150"
                                                      name="descripcion">@if(old("descripcion")){{old("descripcion")}}
                                                @else{{$servicioo->descripcion}}@endif</textarea>
                                            @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="costo_venta">Ingrese el costo de la venta:</label>
                                            <input class="form-control @error('costo_venta') is-invalid @enderror"
                                                   name="costo_venta"
                                                   onkeypress="return valideKey(event);"
                                                   id="costo_venta"
                                                   @if(old("costo_venta"))
                                                   value="{{old("costo_venta")}}"
                                                   @else
                                                   value="{{$servicioo->costo_de_venta}}"
                                                   @endif
                                                   type="number"
                                                   min="0"
                                                   required
                                                   maxlength="20">
                                            @error('costo_venta')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="items-center justify-end mt-4">
                                            <button id="btnRegister" type="submit" class="btn btn-success">Guardar
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Crear Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div>

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

                                    <div class="container register col-md-auto sm-12 " id="detalle_form_prov">
                                        <div class="row" id="detalle_form_prov">
                                            <div class="col-md-3 register-left">
                                                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                                <h1>SMARTEC</h1>
                                            </div>

                                            <div class="col-md-9 register-right">
                                                <div class="row register-form">
                                                    <form method="post" action="{{route("categoria.sto")}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Ingrese el nombre:</label>
                                                            <input type="text" maxlength="80"
                                                                   required
                                                                   value="{{old("nombre")}}"
                                                                   name="nombre"
                                                                   class="form-control  @error('nombre') is-invalid @enderror">
                                                            <small class="text-muted">Maxima longitud 80
                                                                caracteres</small>
                                                            @error('nombre')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>
                                                        <!-- Para ingresar una imagen -->
                                                        <div class="form-group">
                                                            <label>Seleccione una imagen (opcional):</label>
                                                            <input
                                                                class="form-control  @error('imagen') is-invalid @enderror"
                                                                accept="image/*"
                                                                name="imagen_url"
                                                                type="file" placeholder="Ingrese una imagen"
                                                            >
                                                            <small class="text-muted">Solo formatos en imagen (.png ;
                                                                .jpg ; .jpeg)</small>
                                                            @error('imagen')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>
                                                        <button id="btnRegister" type="submit" class="btn btn-success">
                                                            <i class="fa fa-save"></i>
                                                            Guardar
                                                        </button>
                                                        <a id="btnCancel" class="btn btn-primary btn-round"
                                                           data-dismiss="modal">Cancelar</a>
                                                        <!-- -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function valideKey(evt) {
                    var code = (evt.which) ? evt.which : evt.keyCode;
                    if (code == 8) {
                        return true;
                    } else if (code >= 48 && code <= 57) {
                        return true;
                    } else {
                        return false;
                    }
                }

                function valideLetter(evt) {
                    var code = (evt.which) ? evt.which : evt.keyCode;
                    if (code == 8 || code == 32) {
                        return true;
                    } else if (code >= 65 && code <= 122) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
@endsection
