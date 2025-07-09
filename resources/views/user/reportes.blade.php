<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Asignados</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Reportes Asignados</h1>

        @if ($reportes->isEmpty())
            <p>No tienes reportes asignados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nombre del Reporte</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportes as $reporte)
                        <tr>
                            <td>{{ $reporte->NombreReporte }}</td>
                            <td>{{ $reporte->Descripcion }}</td>
                            <td>{{ $reporte->Estado }}</td>
                            <td><a href="{{ Crypt::decryptString($reporte->URL) }}" target="_blank">Ver Reporte</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
