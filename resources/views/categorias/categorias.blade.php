@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Categorias</h3>
        </div>
        <div class="card-body">
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


            <a class="btn btn-success btn-sm float-right" href="{{route("categoria.nueva")}}"><i class="fa fa-plus"></i>
                Agregar</a>

            <br>
            <hr>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categorias as $item=> $categoria)
                    <tr>
                        <th scope="row">{{$item+ $categorias->firstItem()}}</th>
                        <td>{{$categoria->nombre}}</td>
                        <td>
                            <img src="/images/categorias/{{$categoria->imagen}}"
                                 onclick="$('#callModalVistaPrevia{{$categoria->id}}').click()"
                                 width="150px" height="150px" style="object-fit: contain"
                                 onerror="this.src='/images/no_image.jpg'"></td>
                        </td>
                        <td>
                            <!---Boton Editar-->
                            <a class="btn btn-success btn-sm"
                               href="{{route("categoria.editar",['id'=>$categoria->id])}}"
                               title="Editar"><i class="fa fa-pencil"></i></a>

                            <!---Boton Eliminar-->
                            <a class="btn btn-danger btn-sm"
                               href="{{route("categoria.destroy",["id"=>$categoria->id])}}"
                               title="Eliminar">
                                <i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="pagination pagination-sm justify-content-center">
                {{$categorias->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>


@endsection
