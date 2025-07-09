<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- Cargar Font Awesome para el ícono de usuario -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Fijamos la imagen de fondo */
        body {
            background-image: url('images/istockphoto-1480239219-1024x1024.jpg'); /* Sustituye con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        /* Efecto de sombra al pasar el mouse sobre la tarjeta */
        .card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
            transform: scale(1.1); /* Solo agrandamos la tarjeta */
            transition: all 0.3s ease-in-out; /* Transición suave */
        }

        /* Efecto de foco en los campos */
        input:focus, button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.6); /* Azul */
        }

        /* Fondo oscuro con transparencia en la tarjeta */
        .card {
            background-color: rgba(255, 255, 255, 0.85); /* Fondo blanco con opacidad */
            width: 500px; /* Aumento del tamaño de la tarjeta */
            height: 600px; /* Aumento de la altura */
            padding: 30px; /* Aumento del padding */
            transition: all 0.3s ease-in-out; /* Suavizar la transición */
        }

        /* Aumento del tamaño del texto del título */
        .card h2 {
            font-size: 3rem; /* Hacemos el texto más grande */
        }

        /* Estilo para el ícono de usuario */
        .user-icon {
            font-size: 5rem; /* Tamaño más grande del ícono */
            color: #1e40af; /* Color azul */
            margin-bottom: 30px; /* Espacio debajo del ícono */
        }

        /* Agregar animación de entrada */
        .card {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-10 rounded-lg shadow-lg max-w-md w-full card">
            <!-- Ícono de usuario grande -->
            <div class="text-center">
                <i class="fas fa-user user-icon"></i> <!-- Ícono de usuario -->
            </div>
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Iniciar Sesión</h2>

            @if ($errors->any())
                <div class="bg-red-200 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('login') }}" method="POST">
                @csrf
                <div class="mb-6 relative">
                    <label for="email" class="block text-sm font-semibold text-gray-600">Correo electrónico</label>
                    <div class="absolute left-3 top-10 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4-4l-4 4 4 4" />
                        </svg>
                    </div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full p-3 pl-10 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="block text-sm font-semibold text-gray-600">Contraseña</label>
                    <div class="absolute left-3 top-10 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.656 0 3-1.344 3-3s-1.344-3-3-3-3 1.344-3 3 1.344 3 3 3zM12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" class="w-full p-3 pl-10 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition duration-300">Ingresar</button>
            </form>
        </div>
    </div>

</body>
</html>
