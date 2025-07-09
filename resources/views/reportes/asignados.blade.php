<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reportes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        .custom-navbar {
            background-color: #007bff75;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para el iframe en el modal */
        .modal-body iframe {
            width: 100%;  /* Asegura que el iframe ocupe todo el ancho disponible */
            height: 80vh;  /* Ajusta la altura del iframe al 80% de la altura de la ventana */
            border: none;  /* Elimina el borde del iframe */
        }

        /* Aumentar el tamaño del modal */
        .modal-dialog.modal-xl {
            max-width: 90%;  /* Modal ocupa el 90% del ancho de la pantalla */
            width: 90%;  /* Esto asegura que el modal ocupe el 90% del ancho */
            height: 80vh;  /* Ajusta la altura del modal */
        }

        /* Título del modal */
        .modal-header h5 {
            font-size: 1.5rem; /* Aumenta el tamaño del título */
        }

        /* Ajustar el tamaño de todos los botones */
        .btn {
            padding: 10px 20px; /* Ajuste de tamaño común */
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px; /* Bordes menos redondeados para los botones */
        }

        /* Estilo para el botón "Ver Más" */
        .btn-ver-mas {
            background: linear-gradient(145deg, #6a7bff, #3a47db);
            color: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn-ver-mas:hover {
            background: linear-gradient(145deg, #3a47db, #6a7bff);
            box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-3px);
        }

        .btn-ver-mas:active {
            transform: translateY(2px);
        }

        /* Animación al poner el mouse sobre el botón "Ver Más" */
        .btn-ver-mas i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .btn-ver-mas:hover i {
            transform: rotate(15deg);
        }

        /* Fondo color sutil en las filas cuando se pasa el cursor sobre ellas */
        .table tbody tr:hover {
            background-color: #80bdff7a;  /* Cambié el color al solicitado */
        }

        /* Contenedor de botones en fila */
        .btn-group {
            display: flex;
            gap: 10px; /* Espacio entre los botones */
        }

        /* Efecto para el icono de reporte */
        .report-icon {
            font-size: 8rem; /* Aumenté el tamaño del ícono */
            color: #007bff;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .report-icon:hover {
            transform: scale(1.1) rotate(15deg); /* Aumentar y girar el ícono */
            color: #0056b3; /* Cambiar color cuando se pasa el cursor */
        }

    </style>      
</head>
<body class="bg-light">

    <!-- Navbar -->
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
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/admin/menu">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
            </ul>
        </div>
    </nav>  

    <div class="container">
        <!-- Ícono de reportes centrado arriba del título -->
        <div class="text-center mt-5">
            <i class="fas fa-clipboard-list report-icon"></i> <!-- Ícono de reporte interactivo -->
        </div>
        
        <!-- Título centrado -->
        <h2 class="mt-3 text-center">Lista de Reportes</h2>

        <!-- Si hay algún mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contenedor para centrar la tabla -->
        <div class="d-flex justify-content-center">
            <!-- Tabla de reportes centrada -->
            <table class="table table-striped table-bordered" style="width: 80%;">

                <thead>
                    <tr>
                        <th>Nombre del Reporte</th>
                        <th>Descripción</th>
                        <th>Acciones</th> <!-- Columna de botones -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportes as $reporte)
                        <tr>
                            <td>{{ $reporte->NombreReporte }}</td>
                            <td>{{ $reporte->Descripcion }}</td>
                            <td>
                                <!-- Botón "Ver Reporte" -->
                                <button class="btn btn-ver-mas" onclick="verUrlModal('{{ \Illuminate\Support\Facades\Crypt::decryptString($reporte->URL) }}')">
                                    <i class="fas fa-arrow-right"></i> Ver Reporte
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para ver la URL -->
    <div class="modal fade" id="verUrlModal" tabindex="-1" aria-labelledby="verUrlModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verUrlModalLabel">Vista de URL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="urlIframe" src="" frameborder="0" allowfullscreen="true"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Función para mostrar la URL en el iframe del modal
        function verUrlModal(url) {
            document.getElementById('urlIframe').src = url;
            $('#verUrlModal').modal('show');
        }
    </script>

</body>
</html>
