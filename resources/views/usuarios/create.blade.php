<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Incluir Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Proascol - Estadísticas Power BI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estadísticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Más Opciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Tipo de Rol</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Registro Proascol - Estadísticas Power BI</h3>
                    </div>
                    <div class="card-body">
                        <form id="userForm" action="{{ route('usuarios.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_usuario"><i class="fas fa-user"></i> Nombre Usuario:</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contraseña"><i class="fas fa-lock"></i> Contraseña:</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_corporativo"><i class="fas fa-envelope"></i> Correo Corporativo:</label>
                                <input type="email" class="form-control" id="correo_corporativo" name="correo_corporativo" required>
                            </div>
                            <div class="form-group">
                                <label for="rol"><i class="fas fa-user-tag"></i> Rol:</label>
                                <input type="text" class="form-control" id="rol" name="rol" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"><i class="fas fa-info-circle"></i> Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Incluir Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;

            // Enviar el formulario usando AJAX
            $.ajax({
                url: form.action,
                method: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    toastr.success('Datos guardados exitosamente');
                    form.reset(); // Limpiar el formulario después de guardar
                },
                error: function(xhr) {
                    toastr.error('Hubo un error al guardar los datos');
                }
            });
        });
    </script>
</body>
</html>