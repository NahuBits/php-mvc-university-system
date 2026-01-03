<?php
if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'Alumno') {
            $this->view('pages/auth/login');

    exit;
    // Redirige al dashboard


}
if (!isset($grado)) $grado = [];
if (!isset($postgrado)) $postgrado = [];
if (!isset($cursos)) $cursos = [];
?>

<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">

<link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css">

<div class="container-fluid px-3 mt-4">
    
    <h3 class="mb-4" style="color: white;">¡Hola, <?php echo htmlspecialchars($_SESSION['Nombre']);?>👋!</h3>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success text-center">
            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="row g-3 mb-4">
<!-- Cursos -->
<div class="col-md-4">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-header bg-light">
            <h6 class="mb-0">Cursos</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($cursos)): ?>
                <?php foreach ($cursos as $curso): ?>
                    <div class="mb-3">
                        <h6 class="fw-bold"><?php echo htmlspecialchars($curso->nombreCarrera); ?></h6>
                        <p class="mb-2"><?php echo htmlspecialchars($curso->descripcionMuestra); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Inscripto</span>
                            <a href="<?php echo RUTA_URL; ?>/AlumnoController/desinscribirse/<?php echo $curso->idCarrera; ?>" class="btn btn-outline-danger btn-sm">Desinscribirme</a>
                        </div>
                        <button class="btn btn-sm btn-primary mt-2 ver-materias-btn" data-id="<?php echo $curso->idCarrera; ?>">
                            Ver Materias
                        </button>
                        <div class="materias-container mt-2" id="materias-<?php echo $curso->idCarrera; ?>" style="display: none;"></div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info text-center">
                    No hay cursos inscriptos.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
        <!-- Carreras de Grado -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Carreras de Grado</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($grado)): ?>
                        <?php foreach ($grado as $carrera): ?>
                            <div class="mb-3">
                                <h6 class="fw-bold"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h6>
                                <p class="mb-2"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Inscripto</span>
                                    <a href="<?php echo RUTA_URL; ?>/AlumnoController/desinscribirse/<?php echo $carrera->idCarrera; ?>" class="btn btn-outline-danger btn-sm">Desinscribirme</a>
                                </div>
                                <button class="btn btn-sm btn-primary mt-2 ver-materias-btn" data-id="<?php echo $carrera->idCarrera; ?>">
                                    Ver Materias
                                </button>
                                <div class="materias-container mt-2" id="materias-<?php echo $carrera->idCarrera; ?>" style="display: none;"></div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            No hay carreras de grado inscriptas.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Carreras de Posgrado -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Carreras de Posgrado</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($postgrado)): ?>
                        <?php foreach ($postgrado as $carrera): ?>
                            <div class="mb-3">
                                <h6 class="fw-bold"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h6>
                                <p class="mb-2"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Inscripto</span>
                                    <a href="<?php echo RUTA_URL; ?>/AlumnoController/desinscribirse/<?php echo $carrera->idCarrera; ?>" class="btn btn-outline-danger btn-sm">Desinscribirme</a>
                                </div>
                                <button class="btn btn-sm btn-primary mt-2 ver-materias-btn" data-id="<?php echo $carrera->idCarrera; ?>">
                                     Ver Materias
                                </button>
                                <div class="materias-container mt-2" id="materias-<?php echo $carrera->idCarrera; ?>" style="display: none;"></div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">
                            No hay carreras de posgrado inscriptas.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>




    <!-- Tareas pendientes -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h6 class="mb-0">Tareas Pendientes</h6>
        </div>
        <div class="card-body">
            <ul>
                <li>📌 Informe biología - entrega 25/05/2025</li>
                <li>📌 Proyecto matemáticas - entrega 30/05/2025</li>
                <li>📌 Leer capítulo 5 literatura</li>
            </ul>
        </div>
    </div>

    <!-- Noticias -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h6 class="mb-0">Novedades institucionales</h6>
        </div>
        <div class="card-body">
            <ul>
                <li>📢 Se habilitó la inscripción a finales.</li>
                <li>📅 El viernes 20 no habrá clases por mantenimiento.</li>
                <li>📝 Se publicó el cronograma de exámenes 2025.</li>
            </ul>
        </div>
    </div>

    
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Gráfico con Chart.js -->
<script>
    
const ctx = document.getElementById('rendimientoChart').getContext('2d');
const rendimientoChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Prog. 3', 'Sist. Operativos', 'Inglés', 'Estadística'],
        datasets: [{
            label: 'Nota final',
            data: [8, 6, 9, 7],
            backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 10 }
        }
    }
});
</script>

<!-- Carga de materias desde el botón -->
<script>
const baseUrl = "<?php echo RUTA_URL; ?>";

document.addEventListener('DOMContentLoaded', function () {
    const cacheMaterias = {};
    const botones = document.querySelectorAll('.ver-materias-btn');

    botones.forEach(btn => {
        btn.addEventListener('click', function () {
            const idCarrera = this.getAttribute('data-id');
            const contenedor = document.getElementById('materias-' + idCarrera);

            if (contenedor.style.display === 'none' || contenedor.style.display === '') {
                if (cacheMaterias[idCarrera]) {
                    contenedor.innerHTML = cacheMaterias[idCarrera];
                    contenedor.style.display = 'block';
                    this.textContent = 'Ocultar Materias';
                    return;
                }

                contenedor.innerHTML = '<div>Cargando materias...</div>';
                contenedor.style.display = 'block';

                fetch(`${baseUrl}/AlumnoController/getMaterias/${idCarrera}`)
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        if (data.error) {
                            html = '<div>No hay materias para esta carrera.</div>';
                        
                        }else {
                            html = '<ul class="list-group">';
                            data.forEach(materia => {
                                html += `<li class="list-group-item">
                                    <strong>${materia.nombreMateria}</strong><br>
                                    Cuatrimestre: ${materia.cuatrimestre} | Turno: ${materia.turno} | Día: ${materia.DiaCursada} <br>
                                    Hora: ${materia.horaInicio} - ${materia.horaFin} <br>
                                    Profesor: ${materia.nombreProfesor} ${materia.apellidoProfesor}
                                </li>`;
                            });
                            html += '</ul>';
                        }

                        cacheMaterias[idCarrera] = html;
                        contenedor.innerHTML = html;
                        btn.textContent = 'Ocultar Materias';
                    })
                    .catch(() => {
                        contenedor.innerHTML = '<div class="text-danger">Error de conexión.</div>';
                    });
            } else {
                contenedor.style.display = 'none';
                this.textContent = 'Ver Materias';
            }
        });
    });
});
</script>