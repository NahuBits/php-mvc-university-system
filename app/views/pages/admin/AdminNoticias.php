<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    $this->view('pages/auth/login');
    exit;
}
?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; padding: 40px 20px;">
  <div class="container bg-white p-4 rounded shadow">
            <?php if (!empty($mensaje)): ?>
          <div class="alert alert-info text-center">
            <?= htmlspecialchars($mensaje) ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
          <div class="alert alert-info text-center">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>
  <!-- Contenedor en fila -->
  <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px; width: 100%;">

    <!-- Formulario -->
    <div style="flex: 1 1 45%; min-width: 300px;">
      <form action="<?= RUTA_URL ?>/NoticiasController/CrearNoticia" method="POST" class="bg-white p-4 rounded shadow">
        <div class="mb-3">
          <label for="titulo" class="form-label fw-bold">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="255" placeholder="Ingrese el título de la novedad">
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label fw-bold">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required placeholder="Ingrese la descripción de la novedad"></textarea>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" checked>
          <label class="form-check-label" for="activo">Activo</label>
        </div>

        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="seleccionado" name="seleccionado" value="1">
          <label class="form-check-label" for="seleccionado">Seleccionado para portada</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Crear Novedad</button>
      </form>
    </div>

    <!-- Tabla de novedades -->
    <div style="flex: 1 1 50%; min-width: 300px;">
      <?php if (isset($novedades) && !empty($novedades)): ?>
        <div class="bg-white p-3 rounded shadow">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Seleccionar</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($novedades as $nv): ?>
                <tr>
                  <td><?php echo htmlspecialchars($nv->idNovedades); ?></td>
                  <td><?php echo htmlspecialchars($nv->Titulo); ?></td>
                  <td><?php echo htmlspecialchars($nv->Descripcion); ?></td>
                  <td>
                    <form action="<?= RUTA_URL ?>/NoticiasController/ActualizarSeleccionado" method="POST">
                      <input type="hidden" name="idNovedad" value="<?= $nv->idNovedades ?>">
                      <input type="hidden" name="seleccionado" value="<?= $nv->Selecionado ? 0 : 1 ?>">
                      <button type="submit" class="btn btn-sm <?= $nv->Selecionado ? 'btn-success' : 'btn-secondary' ?>">
                        <?= $nv->Selecionado ? '✔' : '✖' ?>
                      </button>
                    </form>
                  </td>
                  <td>
                    <a href="<?= RUTA_URL ?>/NoticiasController/EditarNoticiaVista?id=<?= $nv->idNovedades ?>" class="btn btn-warning btn-sm mb-2">
                      <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <a href="<?= RUTA_URL ?>/NoticiasController/EliminarNoticia?id=<?= $nv->idNovedades ?>" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Eliminar
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-danger">No se encontraron Noticias.</p>
      <?php endif; ?>
    </div>
  </div>     
  </div> <!-- cierre de flex -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
