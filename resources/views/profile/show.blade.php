<style>
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
</style>
<x-app-layout>
    @section("content")
        <div class="container">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">  <h4 >Perfil De Usuario</h4></div><br>
                    <div class="panel-body">
                        <div class="profile-userpic col-md-6 col-xs-12 col-sm-6 col-lg-4">
                            <img alt="User Pic" src="/images/categorias/{{$user->photo}}" id="profile-image1" class="img-circle img-responsive">
                        </div>
                        <div class="col-md-6 col-xs-12 " >
                            <div class="container" >
                                <h4>Usuario: {{$user->name}}</h4>
                            </div><br>
                            <hr>
                            <br><ul class="container" >
                                <h6>Direccion  De Correo: {{$user->email}}</h6><br>
                            </ul>
                            <hr>
                            <br><a href="{{route("usuarios.edit",["id"=>$user->id])}}" class="col-md-8 btn alert-primary">
                                Editar Perfil
                            </a>
                        </div>
                    </div>
                </div>

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
