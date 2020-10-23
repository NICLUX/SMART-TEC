@extends("layouts.main")

@section("content")
    <h4 style="margin-left: 30%">Ingrese Datos Del Nuevo Usuario</h4><br>

    <form method="POST" action="{{ route('compras.crear') }}">
        @csrf
        <div>
            <x-jet-label for="id_usuario" value="{{ __('id_usuario') }}" />
                <select class="form-control" id="exampleFormControlSelect1">
                <div class="form-group">
                    <option>Seleccione El Id de Usuario</option>
                    @foreach($compras as $item => $compra) <option>{{$compra->id_usuario}}</option>
                    @endforeach
                </div>
                </select>
                </div>

        <div>
            <x-jet-label for="id_proveedores" value="{{ __('id_proveedores') }}" />
            <select class="form-control" id="exampleFormControlSelect1">
                <div class="form-group">
                    <option>Seleccione El Id de Proveedores</option>
                    @foreach($compras as $item => $compra) <option>{{$compra->id_proveedores}}</option>
                @endforeach
                </div>
            </select>
        </div>
        <div>
            <div>
                <x-jet-label for="total_compra" value="{{ __('total_compra') }}" />
                <x-jet-input id="total_compra"  class="form-control" type="text" name="total_compra" :value="old('total_compra')" required autofocus autocomplete="total_compra" />
            </div>
        </div>
        <br>
        <div>
            <button class="btn btn-success btn-sm float-right" type="submit" href="{{route("compras.store")}}"><i class="fa fa-plus"></i> Agregar</button>
        </div>
    </form>
@endsection
