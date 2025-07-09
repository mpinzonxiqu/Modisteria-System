<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        /* Estilos de tu vista */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #3087dfb5;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Bienvenido al Nuevo Panel</h1>
        <p>Este es un nuevo panel con una vista personalizada.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Ir al inicio</a>
    </div>
</body>
</html>
