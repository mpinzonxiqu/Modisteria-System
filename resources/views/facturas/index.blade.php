@extends('layouts.app')

@section('title','Facturas')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
      <h3>Facturas</h3>
      <a href="{{ route('facturas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nueva factura
      </a>
  </div>
{{-- 🔍 FILTRO  ------------------------------------------------------ --}}
<form method="GET" action="{{ route('facturas.index') }}" class="filter-bar shadow-sm p-4 mb-5"
      style="background:#fffaf9;border-radius:25px;">
  <div class="row align-items-end">
    <div class="col-md-4 mb-3 mb-md-0">
      <label class="form-label">🔎 Cliente</label>
      <input type="text" name="cliente" value="{{ request('cliente') }}"
             class="form-control big-input" placeholder="Ej: Laura Gómez">
    </div>

    <div class="col-md-3 mb-3 mb-md-0">
      <label class="form-label">📅 Fecha de entrega</label>
      <input type="date" name="fecha_entrega" value="{{ request('fecha_entrega') }}"
             class="form-control big-input">
    </div>

    <div class="col-md-3 mb-3 mb-md-0">
      <label class="form-label">📆 Fecha de recibido</label>
      <input type="date" name="fecha_recibido" value="{{ request('fecha_recibido') }}"
             class="form-control big-input">
    </div>

    <div class="col-md-2">
      <button type="submit" class="btn btn-block btn-pink shadow">
        <i class="fas fa-filter mr-1"></i> Filtrar
      </button>
    </div>
  </div>
</form>
{{-- ------------------------------------------------------------------ --}}

  @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Cliente</th>
        <th>Contacto</th>
        <th>Prenda</th>
        <th>Valor</th>
        <th>Recibido</th>
        <th>Entrega</th>
        <th></th>
      </tr>
    </thead>
    <tbody>  
      @foreach($facturas as $factura)
        <tr>
          <td>{{ $factura->id }}</td>
          <td>{{ $factura->nombre_cliente }}</td>
          <td>{{ $factura->numero_contacto }}</td>
          <td>{{ $factura->prenda }}</td>
          <td>${{ number_format($factura->valor_a_pagar,0,',','.') }}</td>
          <td>{{ $factura->fecha_recibido->format('d/m/Y H:i') }}</td>
          <td>{{ $factura->fecha_entrega->format('d/m/Y') }}</td>
          <td class="text-nowrap">
            <a href="{{ route('facturas.edit',$factura) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('facturas.destroy',$factura) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('¿Eliminar esta factura?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Borrar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $facturas->links() }}
@endsection
