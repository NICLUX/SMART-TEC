@extends("layouts.main")
@section("content")



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="{{route('servicios.update', ['id'=> $servicio->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$servicio->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$servicio->descripcion}}">
        </div>
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="number" class="form-control" name="costo" id="costo" value="{{$servicio->costo}}">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" value="{{$categoria->id}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
    </form>



@endsection
