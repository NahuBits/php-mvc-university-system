<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    $this->view('pages/auth/login');
    exit;
}
?>
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>




<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">

<div class="card shadow-lg p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">

    <h2 class="mb-4 text-center">Gestión de Alumnos y Profesores</h2>

    <!-- Mensaje -->
    <?php if (!empty($mensaje)): ?>
      <div class="alert alert-info">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <!-- Buscador -->
    <form action="<?php echo RUTA_URL; ?>/AdminController/gestionUsuariosbuscar" method="post" class="mb-4 d-flex">
      <input type="text" name="dniABuscar" class="form-control me-2" placeholder="Buscar Por DNI" required>
      <button class="btn btn-primary" type="submit">Buscar</button>
    </form>

    <!-- Usuario encontrado -->
    <?php if (isset($usuarioEncontrado)): ?>
      <div class="col-md-10">
        <form >
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['Nombre']) ?></p>
          </div>
          <div class="mb-3">
            <label class="form-label">Apellido</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['Apellido']) ?></p>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['Email']) ?></p>
          </div>
          <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['telefono']) ?></p>
          </div>
          <div class="mb-3">
            <label class="form-label">DNI</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['DNI']) ?></p>
          </div>
          <div class="mb-3">
            <label class="form-label">Tipo de usuario</label>
            <p class="form-control-plaintext" style="color: white;"><?= htmlspecialchars($usuarioEncontrado['tipoUsuario']) ?></p>
          </div>
        </form>

        <div class="d-flex gap-2 mt-3 mb-5">
          <form action="<?php echo RUTA_URL; ?>/AdminController/gestionEliminarUsuario" method="post">
            <input type="hidden" name="id" value="<?= $usuarioEncontrado['idUsuario'] ?>">
            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
          </form>

          <form action="<?php echo RUTA_URL; ?>/AdminController/gestionAsignarProfesor" method="post">
            <input type="hidden" name="id" value="<?= $usuarioEncontrado['idUsuario'] ?>">
            <button type="submit" name="asignar" class="btn btn-success">Convertir a tipo profesor</button>
          </form>

          <form action="<?php echo RUTA_URL; ?>/AdminController/gestionAsignarAdmin" method="post">
            <input type="hidden" name="id" value="<?= $usuarioEncontrado['idUsuario'] ?>">
            <button type="submit" name="asignar" class="btn btn-success">Convertir a tipo admin</button>
          </form>
        </div>
      </div>
    <?php endif; ?>


    <!-- Listado de usuarios -->
    <!-- Filtro GET por tipo de usuario -->
<form action="<?php echo RUTA_URL; ?>/AdminController/buscarTodosLosUsuarios" method="GET" class="row g-3 mb-4">
  <div class="col-md-6">
    <select name="tipoUsuario" class="form-select">
      <option value="">-- Filtrar por tipo --</option>
      <option value="admin" <?php echo (isset($tipoSeleccionado) && $tipoSeleccionado === 'admin') ? 'selected' : ''; ?>>Admin</option>
      <option value="Profesor" <?php echo (isset($tipoSeleccionado) && $tipoSeleccionado === 'Profesor') ? 'selected' : ''; ?>>Profesor</option>
      <option value="Alumno" <?php echo (isset($tipoSeleccionado) && $tipoSeleccionado === 'Alumno') ? 'selected' : ''; ?>>Alumno</option>
    </select>
  </div>
  <div class="col-md-3">
    <button type="submit" class="btn btn-primary w-100">
      <i class="bi bi-funnel me-1"></i>Filtrar
    </button>
  </div>
</form>

<?php if (isset($lista) && !empty($lista)): ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>NombreUsuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>DNI</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Tipo</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lista as $usuario): ?>
        <tr>
          <td><?php echo htmlspecialchars($usuario->NombreUsuario); ?></td>
          <td><?php echo htmlspecialchars($usuario->Nombre); ?></td>
          <td><?php echo htmlspecialchars($usuario->Apellido); ?></td>
          <td><?php echo htmlspecialchars($usuario->DNI); ?></td>
          <td><?php echo htmlspecialchars($usuario->telefono); ?></td>
          <td><?php echo htmlspecialchars($usuario->Email); ?></td>
          <td><?php echo htmlspecialchars($usuario->tipoUsuario); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p class="text-muted">No se encontraron usuarios.</p>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
