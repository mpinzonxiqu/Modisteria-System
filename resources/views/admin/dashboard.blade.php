<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #ffffff;
            display: flex;
            transition: background-color 0.5s ease;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #3087dfb5;
            color: white;
            position: fixed;
            transition: box-shadow 0.3s ease;
        }
        .sidebar:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 25px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            background-color: #ffffff;
        }
        .content h1 {
            margin-top: 20px;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #3087dfb5;
            animation: fadeIn 2s ease;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .admin-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            font-size: 100px;
            color: #3087dfb5;
            transition: color 0.3s ease;
        }


        .admin-icon:hover {
            color: #2673b8;
        }
        .assign-report {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            font-size: 24px;
            color: #3087dfb5;
            transition: color 0.3s ease;
        }
        .assign-report:hover {
            color: #2673b8;
        }
        .work-areas {
            margin-top: 40px;
        }
        .work-areas h2 {
            text-align: center;
            margin-bottom: 20px;     
            font-size: 1.5rem;
            color: #3087dfb5;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .work-areas .card {
            background-color: #ffffff;
            margin: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, border 0.3s ease;
        }
        .work-areas .card:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            background-color: #f0f8ff;
            border: 2px solid #3087dfb5;
        }
        .work-areas .card button {
            background-color: #3087dfb5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease;
        }
        .work-areas .card button:hover {
            background-color: #2673b8;
            transform: scale(1.1);
            color: #fff;
        }
        .work-areas .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #3087dfb5;
            transition: color 0.3s ease;
        }
        .work-areas .card:hover .card-title {
            color: #2673b8;
        }
        .modal-content {
            transition: all 0.3s ease;
        }
        .modal-header {
            background-color: #3087dfb5;
            color: white;
        }
        .modal-footer button {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .modal-footer button:hover {
            background-color: #2673b8;
            transform: scale(1.05);
        }
        footer {
            background-color: #3087dfb5;
            color: white;
            padding: 20px 0;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }
        footer a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #2673b8;
        }
        .work-areas .card i {
            font-size: 100px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="text-center my-4">
            <h4>Administrador</h4>
        </div>
        <a href="#"><i class="fas fa-home"></i> Inicio</a>
        <a href="http://127.0.0.1:8000/area-de-trabajo"><i class="fas fa-cogs"></i> Lista Area de Trabajo</a>
        <a href="http://127.0.0.1:8000/user-management"><i class="fas fa-users"></i> Lista Usuarios</a>
        <a href="http://127.0.0.1:8000/reportes/lista"><i class="fas fa-file-alt"></i> Listado Reportes</a>
        <a href="#"><i class="fas fa-life-ring"></i> Lista Reportes Asignados - Usuarios</a>
        <a href="#"><i class="fas fa-book"></i> Lista Reporte Asignado Área de Trabajo</a>
        <a href="#"><i class="fas fa-question-circle"></i> Ayuda</a>
    </div>

    <div class="content">
        <div class="d-flex justify-content-between">
            <h1>Bienvenido al Panel Administrador</h1>
            <a href="{{ url('/logout') }}" class="btn btn-danger logout-btn">
    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
</a>

           
        </div>

        <div class="admin-icon">
            <i class="fas fa-user-shield"></i>
        </div>

        <div class="assign-report">
            <a href="#"><i class="fas fa-tasks"></i> Asignar reporte Área de trabajo</a>
        </div>

        <div class="work-areas">
            <h2>Administrador</h2>
            <div class="row">
                <!-- Tarjeta 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Reportes</h5>
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <button data-toggle="modal" data-target="#assignReportModal1" onclick="window.location.href='http://127.0.0.1:8000/nueva-vista';">Crear Reportes</button>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Área de Trabajo</h5>
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <button data-toggle="modal" data-target="#assignReportModal1" onclick="window.location.href='http://127.0.0.1:8000/area-de-trabajo';">Crear Area de Trabajo</button>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="col-md-4">      
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Asignar Reporte - Usuarios</h5>
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <button data-toggle="modal" data-target="#assignReportModal1" onclick="window.location.href='http://127.0.0.1:8000/reporte_usuario/create';">Asignar Reporte Usuarios</button>
                    </div>
                </div>

                <!-- Tarjeta 4: Crear Área de Trabajo -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Asignar Reporte- Área de Trabajo</h5>
                            <i class="fas fa-tasks"></i>
                        </div>
                        <button data-toggle="modal" data-target="#assignReportModal1" onclick="window.location.href='http://127.0.0.1:8000/nueva_lista_reportes/lista';">Crear Asignacion Reporte - Area de Trabajo </button>
                    </div>
                </div>

                <!-- Tarjeta 5: Ir a Usuarios -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Usuarios</h5>
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <button data-toggle="modal" data-target="#goToUsersModal" onclick="window.location.href='http://127.0.0.1:8000/users/create';">Crear Usuarios</button>
                    </div>
                </div>

                <!-- Tarjeta 6: Cargar archivo Excel -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Cargar Archivo Excel</h5>
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <button data-toggle="modal" data-target="#uploadExcelModal" onclick="window.location.href='http://127.0.0.1:8000/cargar-archivo-excel';">
                            Cargar Archivo Excel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <p>&copy; 2025 Power BI - Todos los derechos reservados</p>
        <a href="#">Términos de uso</a> | <a href="#">Política de privacidad</a>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
