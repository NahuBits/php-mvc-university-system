
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Evaluaciones Pendientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/stylesDashboard.css" />
    <link rel="icon" href="<?php echo RUTA_URL; ?>/public/img/utnBlanco.png" type="image/x-icon" />
</head>

<body>

    <!-- Header para Profesor -->
    <?php require RUTA_APP . '/views/layout/users/header.php'; ?>
    <div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">


    <!-- CONTENIDO PRINCIPAL -->
    <div class="container mt-4">
        <h3 class="mb-4"><i class="bi bi-card-checklist me-2"></i>Evaluaciones</h3>

        <table class="table table-hover shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>Materia</th>
                    <th>Evaluación</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Programación</td>
                    <td>Parcial 1</td>
                    <td>10/05/2025</td>
                    <td><span class="badge bg-warning">Pendiente</span></td>
                    <td><a href="#" class="btn btn-sm btn-primary">Corregir</a></td>
                </tr>
                <!-- Agrega más filas si es necesario -->
            </tbody>
        </table>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
