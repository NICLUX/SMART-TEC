@extends("layouts.main")
@section("content")

    <h4>Ingrese datos del nuevo cliente</h4><br>

    <form method="POST" action="">
        @csrf

        <div>
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name"  class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div>
            <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
            <x-jet-input id="telefono"  class="form-control" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
        </div>

        <div>
            <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
            <x-jet-input id="email"  class="form-control" type="email" name="email" :value="old('email')" required />
        </div>

<br>
        <div>
            <button type="submit" class="btn btn-primary btn-lg disabled">
                {{ __('Guardar') }}
            </button>

            <button type="reset" class="btn btn-danger btn-lg disabled">
                {{ __('Cancelar') }}
            </button>
        </div>
    </form>

    @endsection
