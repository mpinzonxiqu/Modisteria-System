<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_usuario">Nombre Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña">
        <label for="correo_corporativo">Correo Corporativo:</label>
        <input type="email" id="correo_corporativo" name="correo_corporativo" value="{{ $usuario->correo_corporativo }}">
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" value="{{ $usuario->rol }}">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion">{{ $usuario->descripcion }}</textarea>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
