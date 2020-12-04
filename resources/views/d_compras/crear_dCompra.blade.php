@extends("layouts.main")
@section("content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nueva compra</h3>
        </div>
        <div class="card-body">
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

            <form action="{{route("DetalleCompras.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Ingrese el nombre:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                           id="nombre"
                           required
                           placeholder="Ingrese el nombre" maxlength="80">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Ingrese la descripcion:</label>
                    <textarea type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                              id="descripcion"
                              placeholder="Ingrese la descripcion"  required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="costo_compra">Ingrese la cantidad del producto:</label>
                    <input class="form-control @error('cantidad') is-invalid @enderror" name="cantidad"
                           id="cantidad"
                           type="number"
                           min="0"
                           required
                           placeholder="Ingrese la cantidad" maxlength="80">
                    @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="costo_compra">Ingrese el costo de la compra:</label>
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
                <div class="form-group">
                    <label for="id_proveedor">Seleccione id proveedor</label>
                    <div class="input-group">
                        <select id="id_proveedor"
                                name="id_proveedor"
                                class="form-control @error('id_proveedor') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-outline-success" href="{{route("proveedor.nuevo")}}" type="button"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    @error('id_proveedor')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_usuario">Seleccione id usuario</label>
                    <div class="input-group">
                        <select id="id_usuarios"
                                name="id_usuarios"
                                class="form-control @error('id_usuarios') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione una opcion</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-outline-success" href="{{route("usuarios.index")}}" type="button"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    @error('id_usuarios')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <!-- -->
            </form>

        </div>
    </div>
@endsection
