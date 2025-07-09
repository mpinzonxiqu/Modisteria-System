@extends('layouts.app')

@section('content')
    <!-- Navbar -->
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Reportes</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <style>
            .custom-navbar {
                background-color: #007bff75;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .center-content { 
                height: 100vh;
                display: flex; 
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .center-icon { 
                font-size: 12rem;
                color: #007bff;
                cursor: pointer;
                transition: transform 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            }
            .center-icon:hover {
                transform: scale(1.4);
                color: #0056b3;
                box-shadow: 0 4px 30px rgba(0, 0, 255, 0.4);
            }

            .card {
                width: 80%;
                padding: 50px;
                box-shadow: 0 4px 40px rgba(0, 0, 0, 0.3);
                border-radius: 20px;
                margin-top: -50px;
                transition: all 0.5s ease-in-out;
            }
            .card:hover {
                box-shadow: 0 10px 50px rgba(0, 0, 0, 0.4);
                transform: rotateY(15deg);
                transform-origin: center;
            }

            .card-header {
                background-color: #28a7458f;
                color: white;
                text-align: center;
                padding: 40px;
                border-radius: 20px 20px 0 0;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            }

            .card-body {
                text-align: center;
                font-size: 1.5rem;
            }

            .form-control:focus {
                border-color: #28a745;
                box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
            .btn-primary:hover {
                background-color: #0056b3;
                transform: scale(1.1);
            }

            .alert .fas {
                margin-right: 10px;
            }

            footer {
                background-color: #f8f9fa;
                padding: 20px;
                box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="bg-light">
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

        <!-- Contenido principal -->
        <div class="container">
            <h2>Usuarios</h2>
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            <td>{{ $user->estado }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer class="text-center mt-5">
            <p>Estadísticas-Proascol V1</p>
            <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
            <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
@endsection
