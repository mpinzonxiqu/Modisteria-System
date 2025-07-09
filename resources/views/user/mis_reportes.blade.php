<!-- resources/views/user/mis_reportes.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reportes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Mis Reportes Asignados</h1>

        @if($reportes->isEmpty())
            <p>No tienes reportes asignados.</p>
        @else
            <ul class="list-group mt-3">
                @foreach($reportes as $reporte)
                    <li class="list-group-item">
                        <strong>{{ $reporte->nombre }}</strong> - {{ $reporte->descripcion }}
                        <!-- Aquí puedes agregar más detalles del reporte -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
