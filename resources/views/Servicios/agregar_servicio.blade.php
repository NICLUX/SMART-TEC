@extends("layouts.main")
@extends("servicios.mejora_vista")
    @section('content')



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

                    <form enctype="multipart/form-data" method="POST"  action="{{ route('servicios.store') }}">
                        @csrf

                        <div class="container">
                            <H2 id="nuevo_ser" >NUEVO SERVICIO</H2>
                            <div id="logo">
                                <h1 class="logo">SMARTEC</h1>
                            </div>
                            <br>
                            <div class="leftbox">
                                <nav>
                                    <a id="profile" class="active"><i class="fa fa-user"></i></a>
                                    <a id="payment"><i class="fa fa-credit-card"></i></a>
                                    <a id="subscription"><i class="fa fa-tv"></i></a>
                                    <a id="privacy"><i class="fa fa-tasks"></i></a>
                                    <a id="settings"><i class="fa fa-cog"></i></a>
                                </nav>
                            </div>
                            <div class="rightbox">
                                <div class="profile">

                                    <div class="form-group">
                                        <label>Ingrese el nombre:</label>
                                        <input class="form-control  @error('nombre') is-invalid @enderror"
                                               placeholder="Nombre"
                                               required
                                               value="{{old("nombre")}}"
                                               maxlength="80" name="nombre"
                                               type="text">
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ingrese una descripción (opcional):</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                  placeholder="Direccion exacta"
                                                  maxlength="80" name="descripcion">
                                      {{old("descripcion")}}
                            </textarea>
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_venta">Precio:</label>
                                        <input class="form-control @error('costo_venta') is-invalid @enderror" name="costo_venta"
                                               id="costo_venta"
                                               type="number"
                                               min="0"
                                               required
                                               placeholder="Ingrese el costo venta" maxlength="80">
                                        @error('costo_venta')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="id_categoria">Seleccione una categoria</label>
                                        <div class="input-group">
                                            <select id="id_categoria"
                                                    name="id_categoria"
                                                    class="form-control @error('id_categoria') is-invalid @enderror" required>
                                                <option value="" selected disabled>Seleccione una opcion</option>
                                                @foreach($categorias as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <a class="btn btn-outline-success" href="{{route("categoria.nueva")}}" type="button"><i
                                                        class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                        @error('id_categoria')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-success " href="{{route("servicios.index")}}"> Cancelar</a>

                                </div>
            </div>
        </div>

                    </form>






            </div>
        </div>


@endsection

