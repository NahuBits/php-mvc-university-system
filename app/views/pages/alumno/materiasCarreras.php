<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div class="container mt-4">
    <h3 class="text-white mb-4">
        Materias de la carrera: <span class="text-info"><?php echo htmlspecialchars($nombreCarrera); ?></span>
    </h3>

    <?php if (!empty($materias)): ?>
        <div class="row">
            <?php foreach ($materias as $materia): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($materia->nombreMateria); ?></h5>
                            <p class="card-text">
                                <strong>Profesor:</strong> <?php echo htmlspecialchars($materia->nombreProfesor . ' ' . $materia->apellidoProfesor); ?><br>
                                <strong>Día/s:</strong> <?php echo htmlspecialchars($materia->DiaCursada); ?><br>
                                <strong>Turno:</strong> <?php echo htmlspecialchars($materia->turno); ?><br>
                                <strong>Horario:</strong> <?php echo date("H:i", strtotime($materia->horaInicio)) . ' - ' . date("H:i", strtotime($materia->horaFin)); ?><br>
                                <strong>Cuatrimestre:</strong> <?php echo $materia->cuatrimestre > 0 ? $materia->cuatrimestre . '°' : 'Anual'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">No hay materias registradas para esta carrera.</div>
    <?php endif; ?>

    <a href="<?php echo RUTA_URL; ?>/AlumnoController/dashboard" class="btn btn-outline-secondary mt-3">
        ← Volver al Dashboard
    </a>
</div>

<?php require RUTA_APP . '/views/layout/users/footer.php'; ?>
