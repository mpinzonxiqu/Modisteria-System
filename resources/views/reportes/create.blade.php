

<x-app-layout>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #3087dfb5;
            color: white;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            background-color: #f0f0f0; /* Color de fondo gris */
        }
        .content h1 {
            margin-top: 20px;
            text-align: center;
        }
        .assign-report {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .assign-report a {
            font-size: 24px;
            color: #3087dfb5;
            text-decoration: none;
        }
        .assign-report i {
            font-size: 80px; /* Tamaño del ícono */
            margin-right: 10px;
        }
        .work-areas {
            margin-top: 40px;
        }
        .work-areas h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .work-areas ul {
            list-style-type: none;
            padding: 0;
        }
        .work-areas li {
            background-color: #ffffff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .work-areas li button {
            background-color: #3087dfb5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .work-areas li button:hover {
            background-color: #2673b8;
        }
    </style>
    
    <div class="sidebar">
        <div class="text-center my-4">
            <i class="fas fa-user-shield fa-3x"></i>
            <h4>Administrador</h4>
        </div>
        <a href="#"><i class="fas fa-home"></i> Inicio</a>
        <a href="#"><i class="fas fa-cogs"></i> Configuración</a>
        <a href="#"><i class="fas fa-users"></i> Usuarios</a>
        <a href="#"><i class="fas fa-file-alt"></i> Reportes</a>
        <a href="#"><i class="fas fa-life-ring"></i> Soporte</a>
        <a href="#"><i class="fas fa-book"></i> Documentación</a>
        <a href="#"><i class="fas fa-question-circle"></i> Ayuda</a>
    </div>
    
    <div class="content">
        <div class="text-center">
            <h1>Estadísticas Power BI</h1>
        </div>
        
        <div class="assign-report">
            <a href="#"><i class="fas fa-tasks"></i> Asignar reporte Área de trabajo</a>
        </div>

        <div class="work-areas">
            <h2>Áreas de Trabajo</h2>
            <ul>
                <li>
                    Área de Trabajo 1
                    <button data-toggle="modal" data-target="#assignReportModal">Asignar reporte</button>
                </li>
                <li>
                    Área de Trabajo 2
                    <button data-toggle="modal" data-target="#assignReportModal">Asignar reporte</button>
                </li>
                <li>   
                    Área de Trabajo 3 
                    <button data-toggle="modal" data-target="#assignReportModal">Asignar reporte</button>
                </li>
                <li>
                    Área de Trabajo 4
                    <button data-toggle="modal" data-target="#assignReportModal">Asignar reporte</button>
                </li>
                <li>
                    Área de Trabajo 5
                    <button data-toggle="modal" data-target="#assignReportModal">Asignar reporte</button>
                </li>
            </ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="assignReportModal" tabindex="-1" role="dialog" aria-labelledby="assignReportModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="assignReportModalLabel">Asignar Reporte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="reportName">Nombre del Reporte</label>
                                <input type="text" class="form-control" id="reportName" placeholder="Ingrese el nombre del reporte">
                            </div>
                            <div class="form-group">
                                <label for="reportArea">Área</label>
                                <input type="text" class="form-control" id="reportArea" placeholder="Ingrese el área">
                            </div>
                            <div class="form-group">
                                <label for="reportDescription">Descripción</label>
                                <textarea class="form-control" id="reportDescription" rows="3" placeholder="Ingrese la descripción"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="reportAssignment">Asignación</label>
                                <input type="text" class="form-control" id="reportAssignment" placeholder="Ingrese la asignación">
                            </div>
                            <div class="form-group">  
                                <label for="reportStatus">Estado</label>
                                <select class="form-control" id="reportStatus">
                                    <option>Pendiente</option>
                                    <option>En Proceso</option>
                                    <option>Completado</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p>Estadísticas-Proascol V1</p>
            <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
            <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
        </footer>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>




