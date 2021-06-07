@extends('layouts.tabla')
    @section('buscar')
        CATEGORIAS
        <a class="btn-sm btn-success float-right" href="{{route("categorias.crear")}}"><i class="fa fa-plus"></i>Agregar</a>
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
@endsection
