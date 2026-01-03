<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    $this->view('pages/auth/login');
    exit;
}
?>

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">


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
        <form action="<?= RUTA_URL ?>/NoticiasController/EditarNoticia" method="POST" class="container mt-4 mb-5">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($novedades->idNovedades); ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label fw-bold">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="255" placeholder="Ingrese el título de la novedad" value="<?= htmlspecialchars($novedades->Titulo); ?>">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label fw-bold">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required placeholder="Ingrese la descripción de la novedad" ><?= htmlspecialchars($novedades->Descripcion); ?></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1"   <?= $novedades->Selecionado ? 'checked' : '' ?>>
                <label class="form-check-label" for="activo">
                Activo
                </label>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="seleccionado" name="seleccionado" value="1"   <?= $novedades->Selecionado ? 'checked' : '' ?>>
                <label class="form-check-label" for="seleccionado">
                Seleccionado para portada
                </label>
            </div>
  
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              </form>
</div>

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
</html>