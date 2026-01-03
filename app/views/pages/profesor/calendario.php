<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Calendario de Clases</title>

    <!-- Estilos y recursos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- Header para Profesor -->
    <?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">

    <!-- Contenido principal -->
    <div class="container mt-4">

     <!-- Botón de regreso -->
        <div class="mb-3">
            <a href="<?= RUTA_URL ?>/Pages/UsuarioMenu" class="btn btn-outline-primary">
                ← Volver al Inicio
            </a>
        </div>
        <!-- Título -->
        <div class="bg-light border-start border-5 border-primary rounded p-3 mb-4 shadow-sm">
            <h3 class="m-0 text-dark">
                <i class="bi bi-calendar-week me-2 text-primary"></i>Calendario de Clases
            </h3>
        </div>

       

        <!-- Contenido del calendario -->
        <?php if (empty($clases)): ?>
            <div class="alert alert-info">
                No se encontraron clases asignadas.
            </div>
        <?php else: ?>
            <table class="table table-hover shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Carrera</th>
                        <th>Materia</th>
                        <th>Turno</th>
                        <th>Día de Cursada</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clases as $clase): ?>
                        <tr>
                            <td><?= htmlspecialchars($clase->nombreCarrera ?? ''); ?></td>
                            <td><?= htmlspecialchars($clase->nombreMateria ?? ''); ?></td>
                            <td><?= htmlspecialchars($clase->turno ?? 'No definido'); ?></td>
                            <td><?= htmlspecialchars($clase->DiaCursada ?? 'No definido'); ?></td>
                            <td><?= htmlspecialchars($clase->horaInicio ?? 'No definido'); ?></td>
                            <td><?= htmlspecialchars($clase->horaFin ?? 'No definido'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
   </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
