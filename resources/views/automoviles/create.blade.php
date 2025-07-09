@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding-top: 80px;
        background: linear-gradient(to bottom, #e0f7fa, #ffffff);
        font-family: 'Segoe UI', sans-serif;
    }

    .custom-navbar {
        background-color: #155724db;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    .navbar-brand, .nav-link {
        color: #fff !important;
        font-weight: bold;
    }

    .navbar-brand:hover, .nav-link:hover {
        color: #cce5ff !important;
    }

    .form-wrapper {
        background-color: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        animation: fadeIn 0.7s ease;
        margin-bottom: 40px;
    }

    .form-wrapper h2 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .icon-auto {
        text-align: center;
        font-size: 90px;
        color: #0d6efd;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .icon-auto:hover {
        transform: scale(1.1);
    }

    .form-label {
        font-weight: 600;
        color: #444;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 6px rgba(13,110,253,0.3);
    }

    .btn-primary {
        width: 100%;
        background-color: #0d6efd;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        font-size: 16px;
        padding: 12px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-2px);
    }

    .alert {
        animation: fadeIn 0.5s ease;
    }

    .lista-vehiculos {
        background: #ffffffb2;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        animation: fadeIn 0.7s ease;
    }

    .lista-vehiculos h3 {
        text-align: center;
        color: #155724;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background-color:rgb(108, 35, 204);
        color: white;
        text-align: center;
    }

    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: #e9f5ff;
        cursor: pointer;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .form-wrapper {
            padding: 30px 20px;
        }
        .lista-vehiculos {
            padding: 20px 15px;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="http://127.0.0.1:8000/login">
          <i class="fas fa-sign-in-alt"></i> Iniciar sesión
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://127.0.0.1:8000/">
          <i class="fas fa-home"></i> Inicio
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Contenido principal -->
<div class="container mt-5">
    <div class="row">
        <!-- Formulario -->
        <div class="col-md-4">
            <div class="form-wrapper">
                <div class="icon-auto">
                    <i class="fas fa-car"></i>
                </div>

                <h2>Registrar Automóvil</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('automoviles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre_propietario" class="form-label">Nombre del propietario:</label>
                        <input type="text" name="nombre_propietario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa:</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_vehiculo" class="form-label">Tipo de vehículo:</label>
                        <select name="tipo_vehiculo" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Carro">Carro</option>
                            <option value="Moto">Moto</option>
                            <option value="Bicicleta">Bicicleta</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca:</label>
                        <input type="text" name="marca" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color (opcional):</label>
                        <input type="text" name="color" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_hora_llegada" class="form-label">Fecha y hora de llegada:</label>
                        <input type="datetime-local" name="fecha_hora_llegada" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>

        <!-- Lista de Vehículos -->
        <div class="col-md-8">
            <div class="lista-vehiculos">
                <h3>Vehículos Registrados</h3>

                @if ($automoviles->isEmpty())
                    <p class="text-muted text-center">No hay vehículos registrados todavía.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Propietario</th>
                                    <th>Placa</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Fecha de llegada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($automoviles as $auto)
                                    <tr>
                                        <td>{{ $auto->nombre_propietario }}</td>
                                        <td>{{ $auto->placa }}</td>
                                        <td>{{ $auto->tipo_vehiculo }}</td>
                                        <td>{{ $auto->marca }}</td>
                                        <td>{{ $auto->modelo }}</td>
                                        <td>{{ $auto->color ?? 'N/A' }}</td>
                                        <td>{{ $auto->fecha_hora_llegada }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
