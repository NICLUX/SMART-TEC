@extends("layouts.main")
@section("content")

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Nueva Categoria</li>
            </ol>
            <div>
            </div>
        </nav>

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
                <form method="post" action="{{route("categoria.store")}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Ingrese el nombre:</label>
                        <input type="text" maxlength="80"
                               required
                               value="{{old("nombre")}}"
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
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <!-- -->
                </form>
            </div>
        </div>
    </div>
@endsection
