<!-- resources/views/user/profile.blade.php -->
<x-app-layout>
    <div class="container">
        <h1 class="text-center">Editar Perfil</h1>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('user.profile') }}">
            @csrf

            <!-- Campo para el nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Campo para el email -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <!-- Puedes agregar otros campos aquí como contraseña, etc. -->

            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </form>
    </div>
</x-app-layout>
