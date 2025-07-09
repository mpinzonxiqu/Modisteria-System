<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Usuario</title>
</head>
<body>
    <h1>Detalles del Usuario</h1>
    <p><strong>Nombre Usuario:</strong> {{ $usuario->nombre_usuario }}</p>
    <p><strong>Contraseña:</strong> {{ $usuario->contraseña }}</p>
    <p><strong>Correo Corporativo:</strong> {{ $usuario->correo_corporativo }}</p>
    <p><strong>Rol:</strong> {{ $usuario->rol }}</p>
    <p><strong>Descripción:</strong> {{ $usuario->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $usuario->estado ? 'Activo' : 'Inactivo' }}</p>
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>
</body>
</html>
