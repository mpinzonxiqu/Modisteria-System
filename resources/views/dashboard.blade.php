<x-app-layout>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            height: 100%;
            margin: 0;
            flex-direction: column;     
        }
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #007bff75; /* Color de fondo actualizado */
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
            width: calc(100% - 250px);
            background-color: #f0f0f0; /* Color de fondo gris */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            width: 50%;
            text-align: center;
            font-size: 1.5rem;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        <a href="http://127.0.0.1:8000/areas_de_trabajo"><i class="fas fa-book"></i> Areas de Trabajo</a>
        <a href="#"><i class="fas fa-question-circle"></i> Ayuda</a>
    </div>
    
    <div class="content">
        <div class="form-container">
            <h2>Agregar Área de Trabajo</h2>
            <form id="areaDeTrabajoForm" action="{{ route('areas_de_trabajo.store') }}" method="POST">
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
    </div>

    <footer class="text-center mt-5">
        <p>Estadísticas-Proascol V1</p>
        <p>&copy; 2025 Proascol. Todos los derechos reservados.</p>
        <p>Contactos: <a href="mailto:soporte@proascol.com">soporte@proascol.com</a> | Tel: +57 123 456 7890</p>
    </footer>

    <div class="alert alert-success" role="alert" id="successAlert">
        <strong>¡Registro exitoso!</strong> Los datos han sido guardados correctamente.
    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('areaDeTrabajoForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario para mostrar la alerta primero
            var alert = document.getElementById('successAlert');
            alert.style.display = 'block'; // Muestra la alerta
            setTimeout(function() {
                alert.style.display = 'none'; // Oculta la alerta después de 3 segundos
                event.target.submit(); // Envía el formulario después de mostrar la alerta
            }, 3000);
        });


        
    </script>
</x-app-layout>
