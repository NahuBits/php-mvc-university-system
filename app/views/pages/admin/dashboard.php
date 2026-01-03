<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    // Si no está activo, redirige al login
    $this->view('pages/auth/login');
    exit;
}
?>
<!-- Cambiar mensaje-->
<?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['mensaje'] ?>
    </div>
    <?php unset($_SESSION['mensaje']); // Borra el mensaje para que no aparezca siempre ?>
<?php endif; ?>
<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow rounded-4">
        <div class="card-body p-4">
          <h2 class="text-center mb-4">Panel de Administrador</h2>
          <p class="text-center text-muted mb-4">Seleccione una funcionalidad para administrar el sistema:</p>

          <div class="row row-cols-1 row-cols-md-2 g-4">

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/MateriaController/crear" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-plus-circle me-2"></i>Agregar Materia
              </a>
            </div>

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/AdminController/agregarCarrera" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-folder-plus me-2"></i>Agregar Carrera
              </a>
            </div>

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/MateriaController/vincular" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-calendar-check me-2"></i>Planificacion de materias
              </a>
            </div>

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/AdminController/listarCarrerasParaEditar" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-pencil-square me-2"></i>Modificar Carreras
              </a>
            </div>

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/MateriaController/verMateriasDictado" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-bar-chart-fill me-2"></i>Modificar planificacion de materias
              </a>
            </div>

            <div class="col">
              <a href="<?php echo RUTA_URL; ?>/MateriaController/modificarMaterias" class="btn btn-secondary w-100 py-3">
                <i class="bi bi-pencil me-2"></i>Modificar Materias
              </a>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
</html>

