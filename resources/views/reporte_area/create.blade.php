


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas Interactivas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
    <style>
        .custom-navbar {
            background-color: #007bff75;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        /* Otros estilos */
    </style>
</head>
<body class="bg-light">
    <!-- Barra de navegación -->
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
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Título y formulario de selección -->
    <div class="container text-center mt-5">
        <h2 class="font-weight-bold">Asignar Reporte a Usuarios</h2>
    </div>

    <!-- Mostrar mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario de asignación de reporte y usuario -->
    <div class="container mt-4">
        <form method="POST" action="{{ route('asignar.reporte') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="reporte_id" class="font-weight-bold">Reporte</label>
                <select name="reporte_id" id="reporte_id" class="form-control custom-select">
                    <option value="">Seleccione un reporte</option>
                    @foreach ($reportes as $reporte)
                        <option value="{{ $reporte->id }}" {{ old('reporte_id') == $reporte->id ? 'selected' : '' }}>
                            {{ $reporte->NombreReporte }} <!-- Asumiendo que 'NombreReporte' es el campo correcto -->
                        </option>
                    @endforeach
                </select>
                @error('reporte_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Menú desplegable para usuarios -->
            <div class="form-group mb-3">
                <label for="user_id" class="font-weight-bold">Usuario</label>
                <select name="user_id" id="user_id" class="form-control custom-select">
                    <option value="">Seleccione un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} <!-- Asumiendo que 'name' es el campo que deseas mostrar del usuario -->
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Asignar Reporte</button>
        </form>
    </div>

    <!-- Pie de página -->
    <footer class="text-center mt-5">
        <p>Estadísticas-Proascol V1</p>
        <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
        <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

