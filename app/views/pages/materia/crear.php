<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">
    <div class="container mt-5">
        <div class="card shadow-lg p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">
            <h2 class="mb-4">Crear Nueva Materia</h2>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-info">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>

            <form action="<?= RUTA_URL; ?>/MateriaController/guardar" method="post">
                <div class="mb-3">
                    <label for="nombreMateria" class="form-label">Nombre de la materia</label>
                    <input type="text" id="nombreMateria" name="nombreMateria" class="form-control" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Crear Materia</button>
                    <a href="<?= RUTA_URL; ?>/Pages/UsuarioMenu" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
</html>
