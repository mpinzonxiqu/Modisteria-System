<!-- resources/views/nueva_lista_reportes/detalle.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Reporte: {{ $reporte->nombre }}</h2>

        <div>
            <p><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
            <!-- Asegúrate de que el campo 'descripcion' esté en tu modelo Reporte -->
        </div>

        <a href="{{ route('nueva_lista_reportes.lista') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
@endsection
