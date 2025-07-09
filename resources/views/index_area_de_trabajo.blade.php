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
            transition: width 0.3s;
        }
        .sidebar.collapsed {
            width: 60px;
        }
        .sidebar.collapsed a {
            text-align: center;
            padding: 10px 0;
        }
        .sidebar.collapsed a i {
            margin-right: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
            transition: padding 0.3s;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            background-color: #f0f0f0; /* Color de fondo gris */
            transition: margin-left 0.3s;
        }
        .content.collapsed {
            margin-left: 60px;
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
        .work-areas li .btn {
            display: flex;
            align-items: center;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
        }
        .work-areas li .btn i {
            margin-right: 5px;
        }
        .work-areas li .btn-group {
            display: flex;
            gap: 10px;
        }
        .btn-edit {
            background-color: #17a2b8ad;
        }
        .btn-edit:hover {
            background-color: #138496;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #3087dfb5;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Modal Styles */
        .modal-content {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .modal-header {
            background-color: #dc3545;
            color: white;
        }
        .modal-footer .btn-secondary {
            background-color: #6c757d;
        }
        .modal-footer .btn-danger {
            background-color: #dc3545;
        }
        .modal-footer .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
    
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
    
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
        <h1><i class="fas fa-plus"></i> Agregar Áreas de Trabajo</h1>

        </div>
        
        <div class="work-areas">
            <ul>
                @foreach($areasDeTrabajo as $area)
                    <li>
                        <div>
                            <i class="fas fa-th-large fa-2x"></i> <!-- Ícono de área -->
                            <strong>Nombre:</strong> {{ $area->nombre }}<br>
                            <strong>Ocupación:</strong> {{ $area->ocupacion }}<br>
                            <strong>Cargo:</strong> {{ $area->cargo }}<br>
                            <strong>Área Asignada:</strong> {{ $area->area_asignada }}<br>
                            <strong>Descripción:</strong> {{ $area->descripcion }}
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('areas_de_trabajo.edit', $area->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Botón para abrir el modal de eliminación -->
                            <button type="button" class="btn btn-delete" data-toggle="modal" data-target="#deleteModal{{ $area->id }}">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>

                            <!-- Opción para ver usuarios dentro de cada área -->
                           
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
hghgudhgyfhf
        <!-- Modal de confirmación de eliminación -->
        @foreach($areasDeTrabajo as $area)
        <div class="modal fade" id="deleteModal{{ $area->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro que desea eliminar el área de trabajo: <strong>{{ $area->nombre }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('areas_de_trabajo.destroy', $area->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <footer class="text-center mt-5">
            <p>Estadísticas-Proascol V1</p>
            <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
            <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
        </footer>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.content').classList.toggle('collapsed');
        }
    </script>
</x-app-layout>
