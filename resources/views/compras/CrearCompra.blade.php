@extends("layouts.main")
@section("content")
    <div>
        <nav aria-label="breadcrumb">
            <h4 class="breadcrumb">Realizar una compra</h4>
        </nav>
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
        <div class="card card-body">
            <div class="container-fluid">
    <form method="POST" action="{{ route('compras.crear') }}">
        @csrf
        <div>
            <x-jet-label for="id_usuario" value="{{ __('id_usuario') }}" />
                <select class="form-control" id="exampleFormControlSelect1"
                        name="id_usuario">
                <div class="form-group">
                    <option>Seleccione El Id de Usuario</option>
                    @foreach($users as $item => $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </div>
                </select>
                </div>

        <div>
            <x-jet-label for="id_proveedore" value="{{ __('id_proveedore') }}" />
            <select class="form-control" id="exampleFormControlSelect1"
                    name="id_proveedore">
                <div class="form-group">
                    <option>Seleccione El Proveedor</option>
                    @foreach($proveedores as $item => $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                    @endforeach
                </div>
            </select>
        </div>
        <div>
            <div placeholder="">
                <x-jet-label for="numero_comprobante" value="{{ __('numero_comprobante') }}" />
                <x-jet-input placeholder="ingrese numero de comprobante" id="numero_comprobante"  class="form-control"
                type="text" name="numero_comprobante" :value="old('numero_comprobante')"
                 required autofocus autocomplete="numero_comprobante"/>
            </div>
            <div>
                <x-jet-label  for="impuesto" value="{{ __('impuesto') }}" />
                <x-jet-input placeholder="ingrese el impuesto" id="impuesto"  class="form-control" type="text"
                             name="impuesto" :value="old('impuesto')"
                             required autofocus autocomplete="impuesto" />
            </div>
        </div>
        <br>
        <div>
            <button class="btn btn-success btn-sm float-right" type="submit" href="{{route("compras.store")}}">
                Guardar</button>
            <button class="btn btn-success btn-sm float-right" type="reset" >
                canselar</button>
        </div>
    </form>
            </div>
        </div>
    </div>
@endsection
