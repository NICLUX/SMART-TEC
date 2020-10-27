@extends("layouts.main")

    @section('content')



        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Agregar Nuevos Servicios</li>
                </ol>
                <div>
                </div>
            </nav>

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

                    <form enctype="multipart/form-data" method="POST"  action="{{ route('servicios.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Ingrese el nombre:</label>
                            <input class="form-control  @error('nombre') is-invalid @enderror"
                                   placeholder="Nombre"
                                   required
                                   value="{{old("nombre")}}"
                                   maxlength="80" name="nombre">
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
                            <label>Ingrese el costo de venta:</label>
                            <input class="form-control  @error('costo_venta') is-invalid @enderror"
                                   placeholder="Costo de Venta"
                                   required
                                   value="{{old("costo_venta")}}" name="costo_venta">
                            @error('costo_venta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Seleccione una categoria:</label>
                            <select name="form1" class="form-control" id="exampleFormControlSelect1">
                                <div class="form-group">
                                    <option>Seleccionar Categoria</option>
                                    <option >Nueva</option>
                                    @foreach($servicios as $item => $servicio) <option>{{$servicio->id_categoria}}</option>
                                    @endforeach
                                </div>
                            </select>
                            @error('id_categoria')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    <hr>
                        <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
@endsection

