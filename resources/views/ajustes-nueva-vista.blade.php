<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reportes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .custom-navbar {
            background-color: #007bff75;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .center-content { 
            height: 100vh;
            display: flex; 
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .center-icon { 
            font-size: 12rem; /* Aumentar mucho más el tamaño del icono */
            color: #007bff;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }
        .center-icon:hover {
            transform: scale(1.4); /* Aumentar aún más el tamaño del icono */
            color: #0056b3;
            box-shadow: 0 4px 30px rgba(0, 0, 255, 0.4); /* Agregar sombra al pasar el mouse */
        }

        .card {
            width: 80%; /* Hacer la tarjeta mucho más grande */
            padding: 50px; /* Aumentar el padding */
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.3); /* Sombra más grande */
            border-radius: 20px;
            margin-top: -50px;
            transition: all 0.5s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.4); /* Sombra más grande al pasar el mouse */
            transform: rotateY(15deg);
            transform-origin: center;
        }

        .card-header {
            background-color: #28a7458f;
            color: white;
            text-align: center;
            padding: 40px; /* Aumentar el padding */
            border-radius: 20px 20px 0 0;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            text-align: center;
            font-size: 1.5rem; /* Aumentar tamaño de la fuente */
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .alert .fas {
            margin-right: 10px;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg custom-navbar">
        <img src="{{ asset('images/Logo Power bi - 1.png') }}" alt="Imagen de Login" class="img-fluid mb-3" style="max-width: 500px;">
        <a class="navbar-brand text-white" href="#">Panel Organizacional - Estadísticas Power BI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/admin/dashboard">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid center-content">
        <div class="card">
            <div class="card-header">
                <h3>Agregar Reportes</h3>
            </div>
            <div class="card-body">
        <i class="fas fa-car center-icon" title="Registrar vehículo"></i>


            </div>
        </div>
    </div>

    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Agregar Reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
        </div>
    </div>

    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="display: none;">
        <i class="fas fa-check-circle"></i> Reporte agregado exitosamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <footer class="text-center mt-5">
        <p>Estadísticas-Proascol V1</p>
        <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
        <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('reportForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío normal del formulario
            var formData = new FormData(this);

            fetch('{{ route('reportes.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    NombreReporte: formData.get('NombreReporte'),
                    URL: formData.get('URL'),
                    Descripcion: formData.get('Descripcion'),
                    Estado: formData.get('Estado')
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar la alerta de éxito
                    document.getElementById('successAlert').style.display = 'block';

                    // Cerrar el modal
                    $('#reportModal').modal('hide');

                    // Limpiar el formulario
                    document.getElementById('reportForm').reset();

                    // Ocultar la alerta después de 5 segundos
                    setTimeout(function() {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 5000);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
