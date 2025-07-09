@extends('layouts.app')

@section('content')
<!-- FontAwesome CDN (se puede incluir en el archivo de layout principal) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Imagen de Login" class="img-fluid mb-3" style="max-width: 500px;">
    <a class="navbar-brand text-light" href="#">Panel Organizacional - Estadísticas Power BI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="#" data-toggle="modal" data-target="#loginModal">
                    <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="http://127.0.0.1:8000/admin/menu">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <!-- Título de la página -->
    <h1 class="text-center mb-4" style="color: #0056b3;">Crear Área de Trabajo</h1>

    <!-- Mostrar mensaje de éxito si hay uno -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card para el formulario -->
    <div class="card shadow-lg rounded-lg" style="max-width: 800px; margin: 0 auto; padding: 30px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); transition: 0.3s;">
        <div class="card-body">
            <!-- Icono de Área de Trabajo -->
            <div class="text-center mb-4">
                <i class="fas fa-briefcase fa-5x" style="color: #0d6efd;"></i>
            </div>

            <!-- Formulario para crear área de trabajo -->
            <form action="{{ route('area-de-trabajo.store') }}" method="POST">
                @csrf

                <!-- Nombre del área -->
                <div class="mb-4">
                    <label for="nombre" class="form-label">
                        <i class="fas fa-building"></i> Nombre del Área
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>  
                    @enderror
                </div>

                <!-- Descripción del área -->
                <div class="mb-4">
                    <label for="descripcion" class="form-label">
                        <i class="fas fa-pencil-alt"></i> Descripción
                    </label>
                    <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de submit -->
                <button type="submit" class="btn btn-primary btn-lg w-100" style="border-radius: 25px; box-shadow: 0px 5px 15px rgba(0,0,0,0.2); transition: 0.3s;">
                    Crear Área de Trabajo
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    /* Estilo de la tarjeta */
    .card {
        max-width: 800px; /* Hacemos la tarjeta más grande */
        margin: 30px auto; /* Centramos la tarjeta con un margen superior */
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        background-color: #ffffff;
    }

    .card:hover {
        transform: translateY(-15px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        background-color: #0d6efd4a; /* Azul más suave y con transparencia */
        color: black; /* Cambié el color del texto a negro cuando se hace hover */
    }

    /* Efecto para los botones */
    .btn-lg {
        padding: 15px;
    }

    .btn:hover {
        transform: scale(1.05);
        transition: 0.3s;
    }

    /* Estilos para la alerta */
    .alert-dismissible {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Estilos para los iconos dentro del formulario */
    .form-label i {
        margin-right: 10px;
        color: #0d6efd; /* Azul para los iconos */
    }

    /* Aumenta el tamaño de los iconos */
    .fa-briefcase {
        color: #0d6efd;
    }

    .text-center i {
        color: #0d6efd;
    }

    /* Barra de navegación */
    .custom-navbar {
        background-color: #007bff75; /* Color de fondo con transparencia */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }

    .navbar-nav .nav-link {
        color: #ffffff; /* Color del texto en los enlaces */
    }

    .navbar-brand {
        color: #ffffff; /* Color de la marca en la navbar */
    }

    .navbar-toggler-icon {
        background-color: #ffffff; /* Color del icono del toggle */
    }

    /* Efecto hover en los enlaces */
    .navbar-nav .nav-link:hover {
        color: #d1e7ff; /* Un tono más suave cuando se pasa el cursor */
    }
</style>

@endsection
