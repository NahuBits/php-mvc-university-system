<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Mis Materias</title>

    <!-- Estilos y fuentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/styleDashboardMaterias.css" />
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- Header para Profesor -->
    <?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">


    <!-- Contenedor principal -->
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
                <i class="bi bi-calendar-week me-2 text-primary"></i>Mis Materias
            </h3>
        </div>

       

        <!-- Categorías de materias -->
        <?php
        $categorias = ['Grado' => 'bg-grado', 'Posgrado' => 'bg-posgrado', 'Curso' => 'bg-curso'];
        ?>

        <?php foreach ($categorias as $tipo => $claseColor): ?>
            <?php if (!empty($materiasPorTipo[$tipo])): ?>
                <div class="<?= $claseColor ?> p-2 rounded mb-3 shadow-sm">
                    <h4 class="m-0">
                        <i class="bi bi-journals me-2"></i><?= $tipo ?>
                    </h4>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                    <?php foreach ($materiasPorTipo[$tipo] as $materia): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($materia->nombreMateria) ?></h5>
                                    <p class="card-text">
                                        <strong>Carrera:</strong> <?= htmlspecialchars($materia->nombreCarrera) ?><br>
                                        <strong>Cuatrimestre:</strong> <?= htmlspecialchars($materia->cuatrimestre) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- Mensaje si no hay materias -->
        <?php if (
            empty($materiasPorTipo['Grado']) &&
            empty($materiasPorTipo['Posgrado']) &&
            empty($materiasPorTipo['Curso'])
        ): ?>
            <div class="alert alert-info">No tienes materias asignadas actualmente.</div>
        <?php endif; ?>
    </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
