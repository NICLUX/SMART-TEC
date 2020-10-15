@extends('layouts.main')
@section("content")

    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Producto">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion">
        </div>
        <div class="form-group">
            <label for="Costo de venta">Costo de venta</label>
            <input type="number" class="form-control" name="Costo de venta" id="Costo de venta" placeholder="Costo de venta">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="categoria">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
    </form>

@endsection
