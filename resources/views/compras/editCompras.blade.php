@extends("layouts.main")
@section("content")
    <h4 style="margin-left: 30%">Ingrese la campra</h4><br>

    <form method="POST" action="{{ route('compras.crear') }}">
        @csrf
         <div>
                <x-jet-label for="total_compra" value="{{ __('total_compra') }}" />
                <x-jet-input id="total_compra"  class="form-control" type="text" name="total_compra" :value="old('total_compra')" required autofocus autocomplete="total_compra" />
            </div>
        </div>
        <br>
        <div>
            <button class="btn btn-success btn-sm float-right" type="submit" href="{{route("compras.store")}}">
              Guardar</button>
        </div>
    </form>
@endsection
