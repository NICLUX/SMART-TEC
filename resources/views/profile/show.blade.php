<style>
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
</style>
<x-guest-layout>
    @extends('layouts.main')
    @section("content")
    @section("content")
        <div class="container" >
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <br>
                    <div class="panel-body">
                        <div class="profile-userpic col-md-6 col-xs-12 col-sm-6 col-lg-4">
                           <a
                              data-toggle="modal" data-target="#modalBorrarApertura">
                               <img style="margin-top: 50px" src="/images/categorias/{{$user->photo}}"
                                    onerror="this.src='/images/no_user.png'" width="100"
                                    class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                           </a>{{$user->name}}

                            </div><br>
                        <div class="col-md-6 col-xs-12 " >
                            <div class="container" >
                                <h4>Usuario: {{$user->usuario}}</h4>
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

                <div class="modal fade" id="modalBorrarApertura" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar foto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route("foto.actualizar",['id'=>$user->id])}}"
                                      enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <!-- Para ingresar una imagen -->

                                <div class="row">
                                    <div class="col-2">
                                        <img
                                            id="imagen_previa" src="/images/categorias/{{$user->photo}}"
                                            onerror="this.src='/images/no_image.jpg'">
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label>Seleccione una imagen (opcional):</label>
                                            <input class="form-control  @error('imagen') is-invalid @enderror"
                                                   accept="image/*"
                                                   name="imagen_url"
                                                   onchange="verImagen(event)"
                                                   type="file" placeholder="Ingrese una imagen"
                                            >
                                            <small class="text-muted">Solo formatos en imagen (.png,.jpg,.jpeg)</small>
                                            @error('imagen')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                    <br>
                                <button type="submit" class="alert btn-primary sm">Guardar</button>
                                <button href="" type="button" class="alert btn-secondary sm" data-dismiss="modal">Cerrar</button>
                                </form>
                        </div>
                    </div>
    @endsection
</x-guest-layout>
