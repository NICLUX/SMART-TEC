@extends('layouts.main')
@section("content")

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" >Servicios

                </li>
            </ol>
        </nav>

    </div>

    <button class="btn btn-sm btn-success float-right" >
        <i class="fa fa-pencil"></i> Agregar Servicio
    </button>
    <table class="table table-borderless table-dark">



        <table class="table table-borderless table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Costo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            </thead>

@endsection
