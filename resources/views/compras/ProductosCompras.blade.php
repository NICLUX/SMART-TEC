@extends("compras.detalle")
@extends("servicios.mejora_vista")
@section("nuevo_prod")
<button class="btn btn-sm btn-outline-success float-right" data-id=""
        data-toggle="modal" data-target="#modalCrear">
    <i class="fa fa-plus"></i></a>
</button>
@endsection

@section('modal')
<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%;">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                            <h1>SMARTEC</h1>
                            <p>Registra nuevo producto!</p>
                        </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <h1 class="register-heading">Agregar Nuevo Producto</h1>
                                    <div class="row register-form">
                                        <div class="col-md-6">

                                            <form id="form_proveedores" style="    width: 450px;" enctype="multipart/form-data"
                                                action="{{route("producto.stor")}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nombre">Ingrese el nombre:</label>
                                                    <input class="form-control @error('nombre') is-invalid @enderror"
                                                        name="nombre" id="nombre" required
                                                        placeholder="Ingrese el nombre" maxlength="80">
                                                    @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_categoria">Seleccione una categoria</label>
                                                    <div class="input-group">
                                                        <select id="id_categoria" name="id_categoria"
                                                            class="form-control @error('id_categoria') is-invalid @enderror"
                                                            required>
                                                            <option value="" selected disabled>Seleccione una opcion
                                                            </option>
                                                            @foreach($categorias as $categoria)
                                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}
                                                            </option>
                                                            @endforeach
                                                        </select>@yield('nuevo')
                                                    </div>
                                                    @error('id_categoria')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="descripcion">Ingrese la descripcion:</label>
                                                    <textarea
                                                        class="form-control @error('descripcion') is-invalid @enderror"
                                                        name="descripcion" id="nombre" required
                                                        placeholder="Ingrese la descripcion" maxlength="80"></textarea>
                                                    @error('descripcion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="costo_compra">Ingrese el costo de la compra:</label>
                                                    <input
                                                        class="form-control @error('costo_compra') is-invalid @enderror"
                                                        name="costo_compra" id="costo_compra" type="number" min="0"
                                                        required placeholder="Ingrese el costo compra" maxlength="80">
                                                    @error('costo_compra')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="costo_venta">Ingrese el costo de la venta:</label>
                                                    <input
                                                        class="form-control @error('costo_venta') is-invalid @enderror"
                                                        name="costo_venta" id="costo_venta" type="number" min="0"
                                                        required placeholder="Ingrese el costo venta" maxlength="80">
                                                    @error('costo_venta')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- Para ingresar una imagen -->
                                                <div class="form-group">
                                                    <label>Seleccione una imagen (opcional):</label>
                                                    <input class="form-control  @error('imagen') is-invalid @enderror"
                                                        accept="image/*" name="imagen_url" type="file"
                                                        placeholder="Ingrese una imagen">
                                                    <small class="text-muted">Solo formatos en imagen
                                                        (.png,.jpg,.jpeg)</small>
                                                    @error('imagen')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <!-- -->
                                                <button id="btnRegister" type="submit"
                                                    class="btn btn-success">Guardar</button>
                                                <a id="btnCancel" class="btn btn-primary btn-round"
                                                   data-dismiss="modal">Cancelar</a>
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
</div>
@endsection


@section('nuevo')
    <button class="btn btn-sm btn-outline-success float-right"
            data-id=""
            data-toggle="modal" data-target="#modalCreare">
        <i class="fa fa-plus"></i>Agregar</a>
    </button>
@endsection

@section('modals')
    <div class="modal fade" id="modalCreare" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%;">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
                                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                                <h1>SMARTEC</h1>
                                <p>Registra nuevo proveedor!</p>
                            </div>
                            <div class="col-md-9 register-right">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <h1 class="register-heading">Agregar Nuevo Proveedor</h1>
                                        <div class="row register-form">
                                            <div class="col-md-6">

                                                <form id="form_proveedores" style="    width: 450px;" enctype="multipart/form-data"                 action="{{route("proveedor.stor")}}"
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
                                                        <label>Ingrese la descripción (opcional):</label>
                                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                                  placeholder="Direccion exacta"
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
                                                                  placeholder="Direccion exacta"
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
                                                               placeholder="Télefono"
                                                               required
                                                               value="{{old("telefono")}}"
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
                                                    <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                                                    <a id="btnCancel" class="btn btn-primary btn-round"
                                                       data-dismiss="modal">Cancelar</a>
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
    </div>
@endsection
