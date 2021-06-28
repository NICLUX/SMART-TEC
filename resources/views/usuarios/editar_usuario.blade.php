@extends('layouts.main')
@extends('Servicios.mejora_vista')
@section("content")

    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("clientes.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row register-form">
                <div class="col-md-6">

                    <form  id="form_proveedores"
                           method="post" action="{{route("usuarios.updatee",['id'=>$user->id])}}"
                          enctype="multipart/form-data">
                        @method("PUT")
                        @csrf

                        <div class="form-group">
                            <label>Ingrese el nombre:</label>
                            <input
                                type="text"
                                pattern="[A-Za-z ]{2,20}"
                                required
                                @if(old("name"))
                                   value="{{old("name")}}"
                                @else
                                   value="{{$user->name}}"
                                @endif
                                   name="name"
                                   class="form-control  @error('name') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 100 caracteres</small>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ingrese el nombre de usuario:</label>
                            <input
                                type="text"
                                pattern="[a-z]{2,20}"
                                required
                                @if(old("usuario"))
                                   value="{{old("usuario")}}"
                                @else
                                   value="{{$user->usuario}}"
                                @endif
                                   name="usuario"
                                   class="form-control  @error('usuario') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 100 caracteres</small>
                            @error('usuario')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ingrese el numero de Telefono:</label>
                            <input
                                type="tel"
                                pattern='\d{8}'
                                required
                                @if(old("telefono"))
                                   value="{{old("telefono")}}"
                                   @else
                                   value="{{$user->telefono}}"
                                   @endif
                                   name="telefono"
                                   class="form-control phone_mascara @error('telefono') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 8 caracteres</small>
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ingrese el numero de Email:</label>
                            <input type="email" maxlength="80"
                                   required
                                   @if(old("email"))
                                   value="{{old("email")}}"
                                   @else
                                   value="{{$user-> email}}"
                                   @endif
                                   name="email"
                                   class="form-control  @error('email') is-invalid @enderror">
                            <small class="text-muted">Maxima longitud 80 caracteres</small>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <hr>
                        <br>
                        <div align="right">
                            <button type="submit" class="alert btn-primary sm">Guardar</button>
                            <a href="{{ route('profile.show') }}" type="button" class="alert btn-secondary sm" >
                                Cerrar</a>
                        </div>


                    </form>
    <script>
        //Permite mostrar la imagen seleccionada
        var verImagen = function(event) {
            var image = document.getElementById('imagen_previa');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
