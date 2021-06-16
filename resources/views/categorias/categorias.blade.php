@extends('layouts.tabla')
    @section('buscar')
        CATEGORIAS
        <a class="btn-sm btn-success float-right"   data-toggle="modal" data-target="#modalCrear"><i class="fa fa-plus"></i>Agregar</a>
    @endsection
@section("contenido")
    @if(count($categorias)>0)
        <div class="table-responsive-sm -mr-2">
            <table class="table table-borderless table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $item=> $categoria)
                    <tr id="resultados">
                        <th scope="row">{{$item+ $categorias->firstItem()}}</th>
                        <td>{{$categoria->nombre}}</td>
                        <td width="20%" height="10%">
                            <img src="/images/categorias/{{$categoria->imagen}}"
                                 onclick="$('#callModalVistaPrevia{{$categoria->id}}').click()"
                                 onerror="this.src='/images/no_image.jpg'"></td>
                        </td>
                        <td>
                            <!---Boton Editar-->
                            <a class="btn-success btn-sm"
                               href="{{route("categoria.editar",['id'=>$categoria->id])}}"
                               title="Editar"><i class="fa fa-pencil"></i>Editar</a>
                            <!---Boton Eliminar-->
                        </td>
                        <td>
                            <a class="btn-danger btn-sm"
                               href="{{route("categoria.destroy",["id"=>$categoria->id])}}"
                               title="Eliminar">
                                <i class="fa fa-trash"></i>Borar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            <div class="pagination pagination-sm justify-content-center">
                {{$categorias->links("pagination::bootstrap-4")}}
            </div>



            <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">AGREGAR CATEGORIA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div>

                                <div class="container register col-md-auto sm-12 " id="detalle_form_prov">
                                    <div class="row" id="detalle_form_prov">
                                        <div class="col-md-3 register-left">
                                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                            <h1>SMARTEC</h1>
                                        </div>

                                        <div class="col-md-9 register-right">
                                            <div class="row register-form">
                                                <form method="post" action="{{route("categorias.store")}}"
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
                                                    <button id="btnRegister" type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                        Guardar
                                                    </button>
                                                    <a id="btnCancel" class="btn btn-primary btn-round"
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
@endsection
