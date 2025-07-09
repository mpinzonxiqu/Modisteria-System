<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .table td, .table th {
            color: black; /* Asegurar que el texto sea negro */
        }
        .btn-custom-edit {
            background-color: #ffc1071a;
            border-color: #ffc1071a;
            color: black;
        }
        .btn-custom-edit:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }
        .btn-custom-delete {
            background-color: #dc354569;
            border-color: #dc354569;
            color: black;
        }
        .btn-custom-delete:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Proascol - Estadísticas Power BI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estadísticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Más Opciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Tipo de Rol</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Usuarios Registrados- Estadisticas Proascol</h1>
        <div class="text-right mb-3">
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre Usuario</th>
                    <th>Correo Corporativo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre_usuario }}</td>
                        <td>{{ $usuario->correo_corporativo }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-custom-edit btn-sm"><i class="fas fa-edit"></i> Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-custom-delete btn-sm"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>