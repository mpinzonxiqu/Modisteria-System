<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .custom-navbar {
            background-color: #007bff75;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .custom-navbar:hover {
            background-color: #0056b3;
        }
        .center-content {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
            flex-direction: column;
        }
        .card {
            width: 100%;
            max-width: 1200px;
            padding: 30px;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            background-color: #ffffff;
            margin: auto;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            background-color: #28a7458f;
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .card-header:hover {
            background-color: #218838;
        }
        .card-body {
            text-align: center;
            font-size: 1.1rem;
        }
        .btn {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.1);
            background-color: #0056b3;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }
        footer:hover {
            background-color: #e2e6ea;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 500px;">
        <a class="navbar-brand text-white" href="#">Panel Organizacional - Estadísticas Power BI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/login') }}">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container-fluid center-content">
        <div class="card">
            <div class="card-header">
                <h3>Lista de Usuarios</h3>
            </div>
            <div class="card-body">
                <!-- Botón Agregar Usuario -->
                <a href="{{ url('/users/create') }}" class="btn btn-primary mb-4">
                    <i class="fas fa-user-plus"></i> Agregar Usuario
                </a>
                <!-- Tabla de usuarios -->
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol ?? 'Sin rol' }}</td>
                            <td>{{ $user->estado }}</td>
                            <td>
                                <a href="{{ route('user-management.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('user-management.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
