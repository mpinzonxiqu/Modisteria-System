@extends('layouts.app')

@section('content')
<head>
    <!-- Agregar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilo para la alerta */
        .alert-custom {
            background-color: #28a745; /* Verde de éxito */
            color: #fff;
            border-radius: 10px; /* Aumentamos el radio del borde */
            padding: 30px; /* Aumentamos el padding */
            font-size: 22px; /* Aumentamos el tamaño de la fuente */
            margin-bottom: 30px; /* Aumentamos el margen inferior */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1); /* Aumentamos la sombra */
            display: none; /* Inicialmente la alerta está oculta */
            opacity: 0;
            transform: translateY(-20px); /* Comienza fuera de la vista */
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        /* Estilo para la alerta cuando aparece */
        .alert-custom.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .alert-custom .close {
            color: #fff;
            font-size: 30px; /* Aumentamos el tamaño del ícono de cierre */
            opacity: 1;
        }

        .alert-custom i {
            margin-right: 15px; /* Aumentamos el margen al ícono */
        }

        /* Estilo para el Navbar con el color especificado */
        .navbar {
            background-color: #007bff75 !important; /* Azul con transparencia */
        }

        /* Personalizar el color del texto del Navbar */
        .navbar-brand, .nav-link {
            color: white !important;
        }

        /* Cambiar el color cuando pasas el mouse sobre los enlaces */
        .nav-link:hover {
            color: #ffdd57 !important;
        }

        /* Estilo para la tarjeta */
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efecto de hover sobre la tarjeta */
        .card:hover {
            transform: scale(1.1); /* La tarjeta se agranda un 10% */
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
        }

        /* Estilo del formulario dentro de la tarjeta */
        .card-body {
            padding: 30px;
        }

        /* Estilo para los encabezados */
        .card-header {
            background-color: #007bff75;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }

    </style>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
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

<!-- Formulario dentro de una tarjeta -->
<div class="container mt-5">
    <!-- Alerta de éxito -->
    <div class="alert alert-custom alert-dismissible fade show" role="alert" id="successAlert">
        <i class="fas fa-check-circle"></i> Usuario creado exitosamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h2>
        </div>
        <div class="card-body">
            <form id="createUserForm">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Rol -->
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol" required>
                        <option value="administrador" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="usuario" {{ old('rol') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                    </select>
                    @error('rol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" required>
                        <option value="activado" {{ old('estado') == 'activado' ? 'selected' : '' }}>Activado</option>
                        <option value="desactivado" {{ old('estado') == 'desactivado' ? 'selected' : '' }}>Desactivado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Centrar el botón -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // Manejar el envío del formulario con AJAX
    $('#createUserForm').on('submit', function(event) {
        event.preventDefault(); // Prevenir que el formulario se envíe de manera tradicional

        var formData = $(this).serialize(); // Obtener todos los datos del formulario

        // Enviar los datos al servidor usando AJAX
        $.ajax({
            url: '{{ route('users.store') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Mostrar la alerta de éxito con el efecto fade-in
                $('#successAlert').addClass('show');
                
                // Limpiar el formulario después de la creación del usuario
                $('#createUserForm')[0].reset();
                
                // Ocultar la alerta después de 5 segundos
                setTimeout(function() {
                    $('#successAlert').removeClass('show');
                }, 5000);
            },
            error: function(xhr) {
                // Manejo de errores, si es necesario
                alert('Hubo un problema al crear el usuario.');
            }
        });
    });

    // Función para cerrar la alerta
    function closeAlert() {
        $('#successAlert').removeClass('show');
    }
</script>

@endsection
