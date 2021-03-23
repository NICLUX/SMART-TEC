@extends("layouts.main")
@extends("servicios.mejora_vista")
@section("content")

    <!---Alerta y envia mensajes al cliente cuando hay un error o se registran -->
    @if(session("exito"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session("exito")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session("error"))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <span class="fa fa-save"></span> {{session("error")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif


    <div class="container register" id="detalle_form_prov">
        <div class="row" id="detalle_form_prov">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h1>SMARTEC</h1>
                <p>Registra nuevo cuenta!</p>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("cuenta.index")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">Agregar Nueva Cuenta</h1>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_cuentas" enctype="multipart/form-data" action="{{route("cuenta.store")}}"
                                       method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id_cliente">Seleccione un Cliente</label>
                                        <div class="input-group">
                                            <select id="id_cliente"
                                                    name="id_cliente"
                                                    class="form-control @error('id_cliente') is-invalid @enderror" required>
                                                <option value="" selected disabled>Seleccione una opcion</option>
                                                @foreach($clientes as $clientes)
                                                    <option value="{{$clientes->id}}">{{$clientes->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <a class="btn btn-outline-success" href="{{route("cliente.nuevo")}}" type="button"><i
                                                        class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                        @error('id_cliente')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_compra">Ingrese la cantidad</label>
                                        <input class="form-control @error('costo_compra') is-invalid @enderror" name="costo_compra"
                                               id="costo_compra"
                                               type="number"
                                               min="0"
                                               required
                                               placeholder="Ingrese el costo compra" maxlength="80">
                                        @error('costo_compra')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                                </form>
                            </div>
                        </div>

@endsection
