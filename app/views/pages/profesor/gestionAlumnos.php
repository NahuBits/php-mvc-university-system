<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">

  <div class="container mt-4">

    <!-- Botón de regreso -->
    <div class="mb-3">
      <a href="<?= RUTA_URL ?>/Pages/UsuarioMenu" class="btn btn-outline-primary">
        ← Volver al Inicio
      </a>
    </div>

    <!-- Título dentro de card -->
    <div class="bg-light border-start border-5 border-primary rounded p-3 mb-4 shadow-sm card">
      <h3 class="m-0 text-dark">
        <i class="bi bi-people-fill me-2 text-primary"></i>Gestión de Alumnos
      </h3>
    </div>

    <?php if (empty($datos['alumnosPorMateria'])): ?>
    <div class="alert alert-info">No hay alumnos inscritos en tus materias por el momento.</div>
<?php else: ?>
    <?php foreach ($datos['alumnosPorMateria'] as $materia): ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-journal-text me-2"></i>
                    Materia: <?= htmlspecialchars($materia['nombreMateria']) ?><br>
                    <small class="text-light">Carrera: <?= htmlspecialchars($materia['nombreCarrera']) ?></small>
                </h5>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Turno</th>
                            <th>Día de cursada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materia['alumnos'] as $alumno): ?>
                            <tr>
                                <td><?= htmlspecialchars($alumno->nombreAlumno) ?></td>
                                <td><?= htmlspecialchars($alumno->apellidoAlumno) ?></td>
                                <td><?= htmlspecialchars($alumno->Email) ?></td>
                                <td><?= htmlspecialchars($alumno->turno) ?></td>
                                <td><?= htmlspecialchars($alumno->DiaCursada) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

  </div>
</div>



