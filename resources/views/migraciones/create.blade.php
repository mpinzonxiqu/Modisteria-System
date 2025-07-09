<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Migración</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Nueva Migración</h2>
        <form action="{{ route('migraciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NombreReporte">Nombre del Reporte</label>
                <input type="text" name="NombreReporte" id="NombreReporte" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="URL" id="URL" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripción</label>
                <textarea name="Descripcion" id="Descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="Estado">Estado</label>
                <select name="Estado" id="Estado" class="form-control" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
