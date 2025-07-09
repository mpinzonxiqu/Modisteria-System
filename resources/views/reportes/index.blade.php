@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Reportes</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre del Reporte</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->nombre }}</td>
                    <td>{{ $reporte->descripcion }}</td>
                    <td>{{ $reporte->estado ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
