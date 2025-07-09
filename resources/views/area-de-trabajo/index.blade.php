@extends('layouts.app')

@section('content')
    <!-- Navbar (Agregado directamente aquí) -->
    <nav class="navbar navbar-expand-lg" style="background-color: #007bff75;">
        <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Imagen de Login" class="img-fluid mb-3" style="max-width: 500px;">
        <a class="navbar-brand text-white" href="#">Panel Organizacional - Estadísticas Power BI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="http://127.0.0.1:8000/admin/menu">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>

    <!-- Título y botones -->
    <h1>Áreas de Trabajo</h1>

    <a href="{{ route('area-de-trabajo.create') }}" class="btn btn-primary">Crear Área de Trabajo</a>

    <!-- Tabla de Áreas de Trabajo -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areasDeTrabajo as $area)
                <tr>
                    <td>{{ $area->nombre }}</td>
                    <td>{{ $area->descripcion }}</td>
                    <td>
                        <a href="{{ route('area-de-trabajo.edit', $area->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('area-de-trabajo.destroy', $area->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
