<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Área de Trabajo</title>

    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg custom-navbar" style="background-color: #007bff75;">
        <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Imagen de Login" class="img-fluid mb-3" style="max-width: 500px;">
        <a class="navbar-brand text-white" href="#">Panel Organizacional - Estadísticas Power BI</a>
        <a class="nav-link text-white" href="http://127.0.0.1:8000/admin/menu">
            <i class="fas fa-home"></i> Inicio
        </a>
    </nav>

    <div class="container text-center">
        <i class="fas fa-chart-pie center-icon"></i>
        <h2>Asignar Área De Trabajo</h2>
        <p>Explora las estadísticas detalladas a continuación.</p>
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

    <div class="container mt-5">
        <!-- Formulario de asignación de área de trabajo -->
        <form action="{{ route('asignar.reporte') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Área de Trabajo -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="area_de_trabajo_id" class="font-weight-bold">Área de Trabajo</label>
                        <select name="area_de_trabajo_id" id="area_de_trabajo_id" class="form-control custom-select">
                            <option value="">Seleccione un área de trabajo</option>
                            @foreach ($areas as $area)
                            <option value="{{ $area->id }}" {{ old('area_de_trabajo_id') == $area->id ? 'selected' : '' }}>
                                {{ $area->nombre }}
                            </option>
                            @endforeach
                        </select>
                        @error('area_de_trabajo_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Reporte -->
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="reporte_id" class="font-weight-bold">Reporte</label>
                        <select name="reporte_id" id="reporte_id" class="form-control custom-select">
                            <option value="">Seleccione un reporte</option>
                            @foreach ($reportes as $reporte)
                            <option value="{{ $reporte->id }}" {{ old('reporte_id') == $reporte->id ? 'selected' : '' }}>
                                {{ $reporte->NombreReporte }}
                            </option>
                            @endforeach
                        </select>
                        @error('reporte_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Botón Asignar -->
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block custom-btn">Asignar</button>
            </div>
        </form>
    </div>

    <footer class="text-center mt-5">
        <p>Estadísticas-Proascol V1</p>
        <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
