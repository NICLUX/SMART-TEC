@extends("layouts.main")
@section("content")
    <div>
        <nav aria-label="breadcrumb">
            <h5 class="breadcrumb">Ingrese la compra</h5>
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
                <select class="form-control" id="exampleFormControlSelect1">
                <div class="form-group">
                    <option>Seleccione El Id de Usuario</option>
                    @foreach($users as $item => $user) <option>{{$user->id_usuario}}</option>
                    @endforeach
                </div>
                </select>
                </div>

        <div>
            <x-jet-label for="id_proveedores" value="{{ __('id_proveedores') }}" />
            <select class="form-control" id="exampleFormControlSelect1">
                <div class="form-group">
                    <option>Seleccione El Id de Proveedores</option>
                    @foreach($compras as $item => $compra) <option>{{$compra->id_proveedores}}</option>
                @endforeach
                </div>
            </select>
        </div>
        <div>
            <div>
                <x-jet-label for="total_compra" value="{{ __('total_compra') }}" />
                <x-jet-input id="total_compra"  class="form-control" type="text" name="total_compra" :value="old('total_compra')" required autofocus autocomplete="total_compra" />
            </div>
        </div>
        <br>
        <div>
            <button class="btn btn-success btn-sm float-right" type="submit" href="{{route("compras.store")}}">
                Guardar</button>
        </div>
    </form>
            </div>
        </div>
    </div>
@endsection
