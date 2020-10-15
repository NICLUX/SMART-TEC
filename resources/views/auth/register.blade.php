<x-guest-layout>

    @section('content')

        <x-jet-validation-errors class="mb-4" />
    <h4 style="margin-left: 30%">Ingrese Datos Del Nuevo Usuario</h4><br>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name"  class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="usuario" value="{{ __('Nombre de Usuario') }}" />
                <x-jet-input id="usuario"  class="form-control" type="text" name="usuario" :value="old('usuario')" required autofocus autocomplete="usuario" />
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Telefono') }}" />
                <x-jet-input id="telefono"  class="form-control" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email"  class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <div>
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password"  class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="password_confirmation" value="{{ __('Confirme Contraseña') }}" />
                <x-jet-input id="password_confirmation"  class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="btn btn-primary btn-lg disabled">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    @endsection
</x-guest-layout>
