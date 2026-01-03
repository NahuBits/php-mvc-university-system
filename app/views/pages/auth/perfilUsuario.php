<?php
if (!isset($_SESSION['tipoUsuario']) || !in_array($_SESSION['tipoUsuario'], ['Profesor', 'Alumno', 'admin'])) {
    header('Location: ' . RUTA_URL . '/AuthController/login');
    exit;
}
?>

<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">



<div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh;">
  <div class="card shadow p-4 rounded-4" style="width: 100%; max-width: 500px; background: #f9f9f9;">
    
    <h2 class="text-center mb-4 fw-bold text-dark">Perfil de Usuario</h2>

    <?php if (!empty($data)): ?>
      <div class="alert alert-info text-center">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo RUTA_URL; ?>/AuthController/verPerfilCambios" id="perfilForm">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_SESSION['NombreUsuario']; ?>" disabled required>
        <label for="nombreUsuario">Nombre de usuario</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?php echo $_SESSION['Nombre']; ?>" disabled required>
        <label for="Nombre">Nombre</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $_SESSION['Apellido']; ?>" disabled>
        <label for="apellido">Apellido</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="dni" id="dni" value="<?php echo $_SESSION['DNI']; ?>" disabled>
        <label for="dni">DNI</label>
      </div>

      <div class="form-floating mb-4">
        <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono']; ?>" disabled>
        <label for="telefono">Teléfono</label>
      </div>
      <div class="form-group mb-3">
          <label for="FotoDePerfil">Imagen actual:</label><br>
            <img src="<?= RUTA_URL ?>/img/avatar/<?php echo $_SESSION['fotoDePerfil']?>" width="100" class="mb-2">
            <input type="file" name="FotoDePerfil" id="FotoDePerfil" class="form-control" accept="image/*">
      </div>

      <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-dark w-45" id="btnEditar">
          Desbloquear
        </button>
        <a href="<?php echo RUTA_URL; ?>/Pages/UsuarioMenu" 
            class="btn px-4 py-2 rounded-pill shadow"
            style="background-color: rgba(14, 0, 0, 0.397); color: white; font-weight: bold; border: 1px solid rgba(255,255,255,0.3);">
            Regresar
        </a>
        <button type="submit" class="btn btn-dark w-45" id="btnModificar" disabled>
          Modificar
        </button>
      </div>
    </form>

  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo RUTA_URL?>/public/js/perfilUsuario.js"></script>

  
</body>
</html>