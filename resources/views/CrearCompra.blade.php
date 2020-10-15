@extends("layouts.main")

@section("content")
    <h4 style="margin-left: 30%">Ingrese Datos Del Nuevo Usuario</h4><br>

    <form method="POST" action="{{ route('compras.crear') }}">
        @csrf
        <div>
            <x-jet-label for="id_usuario" value="{{ __('id_usuario') }}" />
            <x-jet-input id="id_usuario"  class="form-control" type="text" name="id_usuario" :value="old('id_usuario')" required autofocus autocomplete="id_usuario" />
        </div>

        <div>
            <x-jet-label for="id_proveedores" value="{{ __('id_proveedores') }}" />
            <x-jet-input id="id_proveedores"  class="form-control" type="text" name="namid_proveedorese" :value="old('id_proveedores')" required autofocus autocomplete="id_proveedores" />
        </div>
        <div>
            <x-jet-label for="total_compra" value="{{ __('total_compra') }}" />
            <x-jet-input id="total_compra"  class="form-control" type="text" name="total_compra" :value="old('total_compra')" required autofocus autocomplete="total_compra" />
        </div>
    </form>
@endsection
