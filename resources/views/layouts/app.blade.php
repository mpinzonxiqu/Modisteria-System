<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Modistería')</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body{
      font-family:'Quicksand',sans-serif;
      background:#fff6f0;
      color:#4a3e4d;
    }
    .navbar{background:#721c24b8;border-bottom:2px solid #e6d6f3;}
    .navbar-brand{font-family:'Playfair Display',serif;font-weight:700;}
    .table thead{background:#fbe0dc;}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ url('/') }}">Monica Xiques</a>
  </nav>

  <div class="container my-4">
      @yield('content')
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
