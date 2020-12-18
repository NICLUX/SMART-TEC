@extends("layouts.main")
@section("content")
    <h4 style="margin-left: 30%">Ingrese la campra</h4><br>
    <form method="POST" action="{{ route('compras.crear') }}">
        @csrf
         <div>
             <div class="form-group">
                 <label for="total_compra">Ingrese el costo de la compra:</label>
                 <input class="form-control @error('total_compra') is-invalid @enderror" name="total_compra"
                        id="total_compra"
                        type="total_compra"
                        min="0"
                        @if(old("total_compra"))
                        value="{{old("total_compra")}}"
                        @else
                        value="{{$compras->total_compra}}"
                        @endif
                        required
                        placeholder="Ingrese el costo compra" maxlength="80">
                 @error('total_compra')
                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                 @enderror
             </div>
       </br>
        </br>
        <div>
            <a class="btn btn-primary" type="submit" href="{{route("compras.store")}}">
              Guardar</a>
        </div>
    </form>
@endsection
