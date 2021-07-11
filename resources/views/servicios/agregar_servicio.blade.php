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
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h1>SMARTEC</h1>
            <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("servicios.index")}}">Cancelar</a>
        </div>

        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h1 class="register-heading">AGREGAR SERVICIO</h1>
                    <div class="row register-form">
                        <div class="col-md-7">

                            <form action="{{ route("servicios.store") }}" id="form_proveedores"
                                enctype="multipart/form-data" method="POST">
                                @csrf

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="name">Nombre:</label>
                                            <input class="form-control" @error('nombre') is-invalid @enderror name="nombre"
                                                id="nombre" pattern="[A-Za-z,.áéíóú ]{1,20}"
                                                title="Debe ingresar un nombre valido, ejemplo: Programación" required
                                                maxlength="50">
                                            @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="id_categoria">Categoria:</label>
                                                <div class="input-group">
                                                    <select id="id_categoria" name="id_categoria"
                                                        class="form-control @error('id_categoria') is-invalid @enderror" required>
                                                        <option value="" selected disabled></option>
                                                        @foreach($categorias as $categoria)
                                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
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
                                            </div>
                                        </div>
                                    </div>



                                </div>



                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                        name="descripcion" id="nombre" required maxlength="200"></textarea>
                                    @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="costo_de_venta">Precio:</label>
                                    <input class="form-control @error('costo_de_venta') is-invalid @enderror"
                                        name="costo_de_venta" id="costo_de_venta" type="number" min="0" required
                                        maxlength="20">
                                    @error('costo_de_venta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="items-center justify-end mt-4">
                                    <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
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
                                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                                            <h1>SMARTEC</h1>
                                        </div>

                                        <div class="col-md-9 register-right">
                                            <div class="row register-form">
                                                <form method="post" action="{{route("categoria.sto")}}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Ingrese el nombre:</label>
                                                        <input type="text" maxlength="80" required
                                                            value="{{old("nombre")}}" name="nombre"
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
                                                            accept="image/*" name="imagen_url" type="file"
                                                            placeholder="Ingrese una imagen">
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
        @endsection
