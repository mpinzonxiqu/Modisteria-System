@extends('layouts.app')

@section('title','Nueva factura')

@section('content')
  <h3>Nueva factura</h3>
  <form action="{{ route('facturas.store') }}" method="POST">
    @include('facturas._form')
 
  </form>
@endsection
