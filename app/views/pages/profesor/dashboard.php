<?php
if (!isset($_SESSION['tipoUsuario']) == 'Profesor') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Dashboard Profesor</title>

    <!-- Bootstrap y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />

    <!-- Ícono -->
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- Header para Profesor -->
    <?php require RUTA_APP . '/views/layout/users/header.php'; ?>
        <div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">



    <!-- Contenido principal -->
    <div class="container-fluid px-3 mt-4">

        <h3 class="mb-4 text-white">
            ¡Hola, <?php echo htmlspecialchars($_SESSION['Nombre']); ?>👋!
        </h3>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-journal-text fs-2 text-primary me-3"></i>
                        <div>
                            <h6 class="mb-0">Mis Materias</h6>
                            <small>3 asignadas</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-calendar-check fs-2 text-success me-3"></i>
                        <div>
                            <h6 class="mb-0">Próxima clase</h6>
                            <small>Martes 10:00hs</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-bar-chart-line fs-2 text-info me-3"></i>
                        <div>
                            <h6 class="mb-0">Resumen académico</h6>
                            <small>Actualizado al día</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de avance -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Avance de Evaluaciones</h6>
            </div>
            <div class="card-body">
                <canvas id="avanceChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tareas recientes -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">Actividades Recientes</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📌 Subiste calificaciones de Álgebra - 15/05/2025</li>
                    <li>📌 Registraste asistencia en Física</li>
                    <li>📌 Programaste nueva evaluación en Programación</li>
                </ul>
            </div>
        </div>

        <!-- Noticias institucionales -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h6 class="mb-0">Novedades institucionales</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>📢 Capacitación docente el 22/05</li>
                    <li>📅 Reunión de cátedra - viernes 24</li>
                    <li>📝 Evaluaciones globales desde 01/06</li>
                </ul>
            </div>
        </div>

       

    </div>

    

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('avanceChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Álgebra', 'Matematica', 'Programación'], //Materias para cambiar segun las que asignemos en DataBase
                datasets: [{
                    label: 'Evaluaciones corregidas (%)',
                    data: [80, 65, 90],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        max: 100,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
