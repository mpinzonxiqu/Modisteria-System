<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f0f0; /* Color de fondo */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .content {
            width: 100%;
            padding: 20px;
            background-color: #ffffff; /* Color de fondo blanco para el contenido */
        }
        .content h1 {
            margin-top: 20px;
            text-align: center;
        }
        .panel-info {
            margin-top: 40px;
        }
        .panel-info h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            cursor: pointer;
            transition: transform 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-body {
            text-align: center;
            padding: 30px;
        }
        .card-title {
            font-size: 1.5rem;
            margin-top: 15px;
        }
        .icon {
            font-size: 5rem;
            color: #3087dfb5;
        }
        footer {
            margin-top: 40px;
            text-align: center;
        }
        /* Estilos para el navbar */
        .custom-navbar {
            background-color: #007bff75;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar .navbar-brand {
            font-size: 1.5rem;
        }
    </style>
</head>
<body class="bg-light">
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
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <div class="text-center">
            <!-- Icono de usuarios -->
         
            <h1>Panel de Usuario</h1>
        </div>

        <!-- Tarjetas grandes centradas -->
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-chart-line icon"></i>
                            <h5 class="card-title">Ver Reportes Asignados</h5>
                            <button class="btn btn-primary">Ver Más</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-briefcase icon"></i>
                            <h5 class="card-title">Ver Áreas de Trabajo Asignadas</h5>
                            <button class="btn btn-primary">Ver Más</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-info-circle icon"></i>
                            <h5 class="card-title">Información</h5>
                            <button class="btn btn-primary">Ver Más</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
