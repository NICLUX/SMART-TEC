
<x-app-layout>
    @section("content")
        <div style="margin: 20px" class="card-group ">
            <div class="col-sm-6">
                <img src="/images/categorias/{{$user->photo}}"
                     onclick="$('#callModalVistaPrevia{{$user->id}}').click()"
                     width="200px" height="200px" style="object-fit: contain"
                     onerror="this.src='/images/no_user.png'"></b></b>
                <h4>Usuario: {{$user->name}}</h4>
                <h6>Direccion  De Correo: {{$user->email}}</h6>
                <a href="{{route("usuarios.editar",["id"=>$user->id])}}" class="container btn alert-primary">
                    Editar Perfil
                </a>
            </div>
            <div class="col-sm-6" style="margin-top: 20px">
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            </div>
            <div>

                <div >
                    <div class="col-sm-6" style="margin-top: 20px">
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>
                            <x-jet-section-border />
                        @endif
                    </div>
                    <div class="col-sm-6" style="margin-top: 10px">
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                        <x-jet-section-border />
                    </div>

                </div>
    @endsection
</x-app-layout>
