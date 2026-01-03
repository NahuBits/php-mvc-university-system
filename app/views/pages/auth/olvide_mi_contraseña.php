
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/style.css">
</head>

<body>
<!-- Contenedor principal con la imagen de fondo -->
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover; background-position: center;">
    <div class="card shadow-lg p-5 rounded-4" style="width: 100%; max-width: 450px; background-color: :rgba(255, 255, 255, 0.9); border: none;">
        <h3 class="text-center mb-4 text-primary fw-bold">¿Olvidaste tu contraseña?</h3>

        <!-- Error o mensaje de éxito -->
        <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $data['error']; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($data['success'])): ?>
            <div class="alert alert-success text-center">
                <?php echo $data['success']; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de recuperación de contraseña -->
        <form action="<?php echo RUTA_URL; ?>/AuthController/enviarCorreo" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label text-dark">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control rounded-pill border-0 shadow-sm" placeholder="Ingrese su email" required>
            </div>

            <!-- Botón para enviar el enlace de recuperación -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold">Enviar enlace de recuperación</button>
            </div>
        </form>

        <!-- Botón para regresar a la página principal -->
        <div class="d-grid gap-2 mt-3">
            <a href="<?php echo RUTA_URL; ?>" class="btn btn-outline-dark rounded-pill py-2">Volver al Inicio</a>
        </div>

        <!-- Botón para regresar al login -->
        <div class="d-grid gap-2 mt-3">
            <a href="<?php echo RUTA_URL; ?>/AuthController/login" class="btn btn-outline-primary rounded-pill py-2">Volver al Login</a>
        </div>
    </div>
</div>
</body>
