<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('<?= RUTA_URL ?>/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; padding: 20px;">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Editar Materia</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post" action="<?= RUTA_URL ?>/MateriaController/editarMateria/<?= $materia->idMateria ?>">
            <div class="mb-3">
                <label for="nombreMateria" class="form-label">Nuevo nombre de la materia:</label>
                <input type="text" class="form-control" name="nombreMateria" id="nombreMateria" value="<?= htmlspecialchars($materia->nombreMateria) ?>" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <a href="<?= RUTA_URL ?>/MateriaController/modificarMaterias" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>