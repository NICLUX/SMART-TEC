@extends("layouts.main")
@section("content")

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Servicio</h3>
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

            <form action="{{route("servicios.update",["id"=>$servicioo->id])}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="nombre">Ingrese el nombre:</label>
                    <input class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                           id="nombre"
                           @if(old("nombre"))
                           value="{{old("nombre")}}"
                           @else
                           value="{{$servicioo->nombre}}"
                           @endif
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
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                              id="nombre"
                              required
                              placeholder="Ingrese la descripcion" maxlength="80">
                         @if(old("descripcion"))
                            {{old("descripcion")}}
                        @else
                            {{$servicioo->descripcion}}
                        @endif
                    </textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="costo_venta">Ingrese el costo de la venta:</label>
                    <input class="form-control @error('costo_venta') is-invalid @enderror" name="costo_venta"
                           id="costo_venta"
                           @if(old("costo_venta"))
                           value="{{old("costo_venta")}}"
                           @else
                           value="{{$servicioo->costo_de_venta}}"
                           @endif
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
                                <option value="{{$categoria->id}}"
                                @if($servicioo->id_categoria)
                                    {{$servicioo->id_categoria == $categoria->id ? 'selected="selected"':''}}
                                    @endif
                                >{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a class="btn btn-outline-success" href="{{route("categorias.crear")}}"
                               type="button"><i
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
                <!-- -->
            </form>

        </div>
    </div>



@endsection
