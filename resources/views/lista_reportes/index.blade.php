<!-- resources/views/lista_reportes/index.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Asignados a Usuarios</title>

    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar" style="background-color: #007bff75;">
        <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Logo Power BI" class="img-fluid mb-3" style="max-width: 500px;">
        <a class="navbar-brand text-white" href="#">Panel Organizacional - Estadísticas Power BI</a>
        <a class="nav-link text-white" href="{{ route('admin.menu') }}">
            <i class="fas fa-home"></i> Inicio
        </a>
    </nav>

    <!-- Título de la Página -->
    <div class="container text-center mt-5">
        <h2>Reportes Asignados a Usuarios</h2>
        <p>Verifique los reportes asignados a los usuarios y su estado.</p>
    </div>

    <!-- Mostrar la alerta de éxito si existe -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Tabla de Reportes Asignados -->
    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Reporte</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportesAsignados as $reporteUsuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reporteUsuario->user->name }}</td>
                    <td>{{ $reporteUsuario->reporte->NombreReporte }}</td>
                    <td>{{ ucfirst($reporteUsuario->estado_asignado) }}</td>
                    <td>
                        <!-- Acciones como editar y eliminar -->
                        <a href="{{ route('editar.reporte', $reporteUsuario->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ route('eliminar.reporte', $reporteUsuario->id) }}" method="POST" style="display:inline;">
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
