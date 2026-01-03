<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    $this->view('pages/auth/login');
    exit;
}
?>
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">
<div class="container bg-white p-4 rounded shadow">

    <?php if (!empty($mensaje)): ?>
      <div class="alert alert-info text-center">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger text-center">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <?php if (isset($MateriasDictado) && !empty($MateriasDictado)): ?>
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre Materia</th>
            <th>Nombre Carrera</th>
            <th>Profesor</th>
            <th>Cuatrimestre</th>
            <th>Turno</th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($MateriasDictado as $md): ?>
            <tr>
              <td><?= htmlspecialchars($md->IDMateriaDetalle); ?></td>
              <td><?= htmlspecialchars($md->nombreMateria); ?></td>
              <td><?= htmlspecialchars($md->nombreCarrera); ?></td>
              <td><?= htmlspecialchars($md->Nombre); ?></td>
              <td><?= htmlspecialchars($md->cuatrimestre); ?></td>
              <td><?= htmlspecialchars($md->turno); ?></td>
              <td><?= htmlspecialchars($md->DiaCursada); ?></td>
              <td><?= htmlspecialchars($md->horaInicio); ?></td>
              <td><?= htmlspecialchars($md->horaFin); ?></td>
              <td>
                <a href="<?= RUTA_URL ?>/MateriaController/VerMateriaDictadoSelect?id=<?= $md->IDMateriaDetalle ?>" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil-square"></i> Editar
                </a>
                <a href="<?= RUTA_URL ?>/MateriaController/EliminarMateriaDictado?id=<?= $md->IDMateriaDetalle ?>" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil-square"></i> Eliminar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-danger text-center">No se encontraron materias dictadas.</p>
    <?php endif; ?>

  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
