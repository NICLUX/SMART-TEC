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
                <p>Registra nuevos cliente!</p>
                <a id="btn-cancelar" class="btn btn-primary btn-round" href="{{route("inventario.nuevo")}}">Cancelar</a>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="register-heading">Agregar Nuevo Inventario</h1><br>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <form  id="form_proveedores" enctype="multipart/form-data" action="{{route("inventario.store")}}"
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Seleccione el producto:</label>
                        <select class="select2 form-control @error('id_producto') is-invalid @enderror"
                                name="id_producto"
                                id="selectProducto" required>
                            <option disabled selected>Seleccione una opcion</option>
                            @foreach($productos as $producto)
                                <option value="{{$producto->id}}"
                                @if(old("id_producto"))
                                    {{old("id_producto") == $producto->id ? 'selected="selected"':''}}
                                        @endif>{{$producto->nombre}}</option>
                            @endforeach
                        </select>
                        @error('id_producto')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ingrese la cantidad en Stock</label>
                        <input class="form-control @error('cantidad') is-invalid @enderror"
                               name="cantidad"
                               required
                               value="{{old("cantidad")}}"
                               placeholder="Cantidad en stock"
                               type="number" min="0">
                        @error('id_producto')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                                <button id="btnRegister" type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
