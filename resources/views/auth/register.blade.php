
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="form-group">
                <label for="name">Ingrese el nombre de usuario:</label>
                <input id="usuario"  class="form-control @error('name') is-invalid @enderror" name="usuario"
                       required
                       placeholder="Ingrese el nombre de usuario" maxlength="80">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="costo_compra">Ingrese el telefono:</label>
                <input class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                       id="telefono"
                       type="number"
                       min="0"
                       required
                       placeholder="Ingrese el telefono" maxlength="80">
                @error('telefono')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_proveedor">Seleccione el tipo de usuario</label>
                <div class="input-group">
                    <select id="is_admin"
                            name="is_admin"
                            class="form-control @error('is_admin') is-invalid @enderror" required>
                        <option value="" selected disabled>Seleccione una opcion</option>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->tipo_users}}</option>
                        @endforeach
                    </select>
                </div>
                @error('is_admin')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

