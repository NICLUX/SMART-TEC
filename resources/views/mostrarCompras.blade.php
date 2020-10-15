@extends("layouts.main")

@section("content")

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" >Mostrar Compras</li>
            </ol>
        </nav>

        <hr>

        <button class="btn btn-sm btn-success float-right"
                data-toggle="modal" data-target="#modalCrearApertura">Agregar Compra
        </button>

        <br><br>
        @if(session("exito"))
            <div class="alert alert-success ">
                {{session("exito")}}
            </div>
        @endif

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id_usuario</th>
                    <th scope="col">id_proveedores</th>
                    <th scope="col">'total_compra'</th>

                </tr>
                </thead>
            </table>
@endsection
