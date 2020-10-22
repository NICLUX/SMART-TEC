@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Categoria</h3>
        </div>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("categorias.index")}}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
                </ol>
            </nav>

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
            <div class="card card-body">
                <div class="container-fluid">
                    <form method="post" action="{{route("categoria.update",['id'=>$categoria->id])}}"
                          enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label>Ingrese el nombre:</label>
                            <input type="text" maxlength="80"
                                   required
                                   @if(old("nombre"))
                                   value="{{old("nombre")}}"
                                   @else
                                   value="{{$categoria->nombre}}"
                                   @endif
                                   name="nombre"
                                   class="form-control  @error('nombre') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 80 caracteres</small>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- Para ingresar una imagen -->
                        <div class="row">
                            <div class="col-2">
                                <img src="/images/categorias/{{$categoria->imagen}}"
                                     onerror="this.src='/images/no_image.jpg'">
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Seleccione una imagen (opcional):</label>
                                    <input class="form-control  @error('imagen') is-invalid @enderror"
                                           accept="image/*"
                                           name="imagen_url"
                                           type="file" placeholder="Ingrese una imagen"
                                    >
                                    <small class="text-muted">Solo formatos en imagen (.png,.jpg,.jpeg)</small>
                                    @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <!-- -->
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection

