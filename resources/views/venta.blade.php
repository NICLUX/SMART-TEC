@extends('layouts.main')
@section("content")
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Ventas

                </li>
            </ol>
        </nav>

        </div>
    <button class="btn btn-sm btn-success float-right" >
        <i class="fa fa-pencil"></i> Nueva Venta
    </button>
        <table class="table table-borderless table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha</th>
                <th scope="col">Usuario</th>
                <th scope="col">Total de Venta</th>
                <th scope="col">Detalle</th>
            </tr>
            </thead>
@endsection
