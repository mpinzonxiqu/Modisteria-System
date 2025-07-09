@extends('layouts.app')

@section('title','Editar factura')

@section('content')
  <h3>Editar factura #{{ $factura->id }}</h3>
  <form action="{{ route('facturas.update',$factura) }}" method="POST">
    @method('PUT')
    @include('facturas._form')
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
