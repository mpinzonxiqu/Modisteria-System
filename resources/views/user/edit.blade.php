@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Usuario</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <input type="text" class="form-control" name="rol" value="{{ $user->rol }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" value="{{ $user->estado }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar Usuario</button>
        </form>
    </div>
@endsection
