@extends('layouts.main')
@section('content')
    @foreach($compras as $compra)
            tetwp {{$compra->id}}

    @endforeach

@endsection
