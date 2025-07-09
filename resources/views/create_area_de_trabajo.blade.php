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
            <h2>Agregar Área de Trabajo</h2>
            <form action="{{ route('areas_de_trabajo.store') }}" method="POST">
                @csrf
                <div class="form-group">


                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                    <label for="ocupacion">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="Ingrese la ocupación">
                </div>
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingrese el cargo">
                </div>
                <div class="form-group">
                    <label for="area_asignada">Área Asignada</label>
                    <input type="text" class="form-control" id="area_asignada" name="area_asignada" placeholder="Ingrese el área asignada">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese la descripción"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>






                
            </form>
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






