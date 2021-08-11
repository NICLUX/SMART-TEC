@extends('layouts.tabla')
@section('buscar')
    CATEGORÍAS
    <a class="btn-sm btn-success float-right" data-toggle="modal" data-target="#modalCrear" style="color:#ffffff;">
        <i class="fa fa-plus"></i> Agregar</a>
@endsection
@section("contenido")
    @if(count($categorias)>0)
        <div class="table-responsive-sm -mr-2">
            <table class="table table-borderless table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $item=> $categoria)
                    <tr id="resultados">
                        <th scope="row">{{$item+ $categorias->firstItem()}}</th>
                        <td width="20%" height="10%">
                            <img src="/images/categorias/{{$categoria->imagen}}"
                                 onclick="$('#callModalVistaPrevia{{$categoria->id}}').click()"
                                 onerror="this.src='/images/no_image.jpg'"></td>
                        </td>
                        <td>{{$categoria->nombre}}</td>
                        <td>
                            <!---Boton Editar-->
                            <a class="btn-success btn-sm" href="{{route("categoria.editar",['id'=>$categoria->id])}}"
                               title="Editar"><i class="fa fa-pencil"></i></a>
                            <!---Boton Eliminar-->
                        </td>
                        <td>
                            <a class="btn-danger btn-sm" data-toggle="modal"
                               data-target="#modalCrear_{{$categoria->id}}"
                               title="Eliminar" style="color:#ffffff;">
                                <i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modalCrear_{{$categoria->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">¿Desea eliminar esta Categoría?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col" align="center"><a id="btnCancel"
                                                                           class="btn btn-primary btn-round"
                                                                           data-dismiss="modal">Cancelar</a>
                                        </div>
                                        <div class="col" align="center"><a id="btnCancel"
                                                                           href="{{route("categoria.destroy",["id"=>$categoria->id])}}"
                                                                           class="btn btn-success"><i
                                                    class="fa fa-trash"></i>
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">
                    <h4>No hay categorias agregadas aún, presiona el botón de agregar.</h4>
                </div>
            @endif
            <div class="pagination pagination-sm justify-content-center">
                {{$categorias->links("pagination::bootstrap-4")}}
            </div>

            <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 150%;">
                        <div class="modal-header">
                            <h5 class="modal-title">Nueva Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="container register col-md-auto" id="detalle_form_prov">
                                    <div class="row" id="detalle_form_prov">
                                        <div class="col-md-3 register-left">
                                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                            <h1>SMARTEC</h1>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <div class="row register-form">
                                                <form method="post" style="width: 100%;" id="form_prove"
                                                      action="{{route("categorias.store")}}"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label>Ingrese el nombre:</label>
                                                        <input type="text" maxlength="80" required
                                                               onkeypress="return valideLetter(event);"
                                                               placeholder="Ingrese la categoría"
                                                               value="{{old("nombre")}}"
                                                               name="nombre" class="form-control  @error('nombre')
                                                            is-invalid @enderror">
                                                        <small class="text-muted">Máxima longitud 80 caracteres</small>
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
                                                        <small class="text-muted">Solo formatos en imagen
                                                            (.png,.jpg,.jpeg)</small>
                                                        @error('imagen')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>@enderror</div>

                                                    <button id="btnRegister" type="submit" class="btn btn-success"><i
                                                            class="fa fa-save"></i> Guardar
                                                    </button>
                                                    <a id="btnCan" class="btn btn-round"
                                                       href="{{route("categorias.index")}}">Cancelar</a>
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

            <script>
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
