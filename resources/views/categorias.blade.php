@extends("layouts.main")
@section("content")

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
            <div>
            </div>
        </nav>

        <a class="btn btn-success btn-sm float-right" href="{{route("categoria.nueva")}}"><i class="fa fa-plus"></i> Agregar</a>



        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
            </tr>
            </tbody>
        </table>

    </div>


@endsection
