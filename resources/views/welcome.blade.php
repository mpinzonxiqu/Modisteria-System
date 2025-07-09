<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modistería Monica Xiques</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Quicksand:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background: url('images/art-3561710_1280.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
    }

    .overlay {
      background-color: rgba(255, 246, 240, 0.92);
      min-height: 100vh;
      padding-bottom: 50px;
    }

    .custom-navbar {
      background-color: #fbe0dc;
      border-bottom: 2px solid #e6d6f3;
      padding: 1rem 2rem;
    }

    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      color: #4a3e4d;
    }

    .navbar-nav .nav-link {
      color: #4a3e4d !important;
      font-weight: 600;
    }

    .center-icon {
      font-size: 5rem;
      color: #d9a5b3;
      margin-top: 2rem;
    }

    h2 {
      font-weight: bold;
      margin-top: 1rem;
      font-family: 'Playfair Display', serif;
    }

    .card {
      background-color: #ffffff;
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      color: #4a3e4d;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .card-title {
      font-weight: bold;
      color: #a866a5;
    }

    .card-header {
      background-color: transparent;
      border-bottom: none;
    }

    footer {
      background-color: #e6d6f3;
      color: #4a3e4d;
      padding: 20px 0;
    }

    footer a {
      color: #4a3e4d;
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .center-icon {
        font-size: 4rem;
      }

      .card {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="overlay">
    <nav class="navbar navbar-expand-lg custom-navbar">
      <a class="navbar-brand" href="#">Monica Xiques</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-home"></i> Inicio</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container text-center">
      <i class="fas fa-cut center-icon"></i>
      <h2>Panel de Gestión de la Modistería</h2>
      <p>Bienvenida al sistema de pedidos, ingresos y entregas de prendas confeccionadas a medida.</p>
    </div>

    <div class="container mt-5">
      <div class="row d-flex align-items-stretch">
        <div class="col-md-4 col-12 mb-4 d-flex">
          <div class="card p-3 w-100 h-100">
            <div class="card-header">
              <h5 class="card-title"><i class="fas fa-scissors"></i> Pedidos Activos</h5>
            </div>
            <div class="card-body">
              <p>Actualmente hay <strong>12</strong> prendas en confección.</p>
              <canvas id="chart1" height="180"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 mb-4 d-flex">
          <div class="card p-3 w-100 h-100">
            <div class="card-header">
              <h5 class="card-title"><i class="fas fa-coins"></i> Ingresos Mensuales</h5>
            </div>
            <div class="card-body">
              <p>Consulta los ingresos generados mes a mes.</p>
              <canvas id="chart2" height="180"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 mb-4 d-flex">
          <div class="card p-3 w-100 h-100">
            <div class="card-header">
              <h5 class="card-title"><i class="fas fa-tape"></i> Tiempos de Entrega</h5>
            </div>
            <div class="card-body">
              <p>Controla los tiempos promedio de entrega por tipo de prenda.</p>
              <canvas id="chart3" height="180"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center">
      <p>&copy; 2025 Modistería Monica Xiques. Todos los derechos reservados.</p>
      <p>Contacto: <a href="mailto:contacto@monicaxiques.com">contacto@monicaxiques.com</a> | Tel: +(57) 123456789</p>
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    new Chart(document.getElementById('chart1').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['En proceso', 'Terminadas'],
        datasets: [{
          data: [8, 4],
          backgroundColor: ['#fcbad3', '#ffe0f0']
        }]
      }
    });

    new Chart(document.getElementById('chart2').getContext('2d'), {
      type: 'line',
      data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [{
          label: 'Ingresos ($)',
          data: [1200, 1400, 1600, 1300, 1500, 1700],
          backgroundColor: 'rgba(248, 187, 208, 0.3)',
          borderColor: '#d48dad',
          borderWidth: 2
        }]
      }
    });

    new Chart(document.getElementById('chart3').getContext('2d'), {
      type: 'bar',
      data: {
        labels: ['Vestidos', 'Blusas', 'Pantalones', 'Faldas'],
        datasets: [{
          label: 'Días promedio',
          data: [4, 3, 5, 2],
          backgroundColor: '#e6b2d1'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>
