<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/style.css">
</head>
<body>

<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover; background-position: center;">
  <div class="card shadow-lg p-5 rounded-4 my-2" style="width: 100%; max-width: 450px; background-color: :rgba(255, 255, 255, 0.9); border: none;">
  <h3 class="text-center mb-4 text-primary fw-bold">Registro de Usuario</h3>

    <?php if (!empty($data['errorRegistro'])): ?>
            <div class="alert alert-danger text-center">
        <?php echo $data['errorRegistro']; ?>
            </div>
        <?php endif; ?>

    <form action="<?php echo RUTA_URL; ?>/AuthController/actregistroUsuario" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su Nombre" required>
            </div>
            <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su Apellido" required>
            </div>
            <div class="mb-3">
        <label for="NombreUsuario" class="form-label">Usuario</label>
        <input type="text" name="NombreUsuario" id="NombreUsuario" class="form-control" placeholder="Ingrese su Usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
      <div class="mb-3">
        <label for="password2" class="form-label">Repite la Contraseña</label>
        <input type="password" name="password2" id="password2" class="form-control" placeholder="Ingrese su contraseña" required>
      </div>
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
        <input type="text" name="DNI" id="DNI" class="form-control" placeholder="Ingrese su DNI" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Correo</label>
                <input type="email" name="Email" id="Email" class="form-control" placeholder="Ingrese su email" required>
            </div>
            <div class="mb-3">
                <label for="Celular" class="form-label">Celular</label>
        <input type="text" name="Celular" id="Celular" class="form-control" placeholder="Ingrese su Celular" required>
            </div>
            <div class="mb-3">
        <label for="formFile" class="form-label">Foto de perfil</label>
        <input type="file" name="foto_perfil" id="formFile" class="form-control" required>
            </div>
            

            <button type="submit" class="btn btn-primary w-100">Registrarse</button>

      <!-- Botones de navegación -->
      <div class="d-grid gap-2 mt-3">
        <a href="<?php echo RUTA_URL; ?>/AuthController/login" class="btn btn-outline-dark rounded-pill">Volver al Login</a>
        <a href="<?php echo RUTA_URL; ?>/" class="btn btn-outline-dark rounded-pill">Volver al Inicio</a>
      </div>
        </form>
    </div>
</div>

</body>
</html>
