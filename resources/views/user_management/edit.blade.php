@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>

    <form action="{{ route('user-management.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        
        <!-- Campo Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        
        <!-- Campo Contraseña -->
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Deja vacío si no deseas cambiarla">
        </div>
        
        <!-- Campo Estado (Activado/Desactivado) -->
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="activado" {{ old('estado', $user->estado) == 'activado' ? 'selected' : '' }}>Activado</option>
                <option value="desactivado" {{ old('estado', $user->estado) == 'desactivado' ? 'selected' : '' }}>Desactivado</option>
            </select>
        </div>

        <!-- Campo Rol (Administrador/Usuario) -->
        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" id="rol" class="form-control" required>
                <option value="admin" {{ old('rol', $user->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="user" {{ old('rol', $user->rol) == 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection
