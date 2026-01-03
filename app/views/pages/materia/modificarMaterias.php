<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('<?= RUTA_URL ?>/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-white">Gestión de Materias</h2>
        <div>
            <a href="<?= RUTA_URL ?>/MateriaController/materiasEliminadas" class="btn btn-outline-light me-2">
                <i class="bi bi-archive"></i> Ver Materias Eliminadas
            </a>
            <a href="<?= RUTA_URL ?>/Pages/UsuarioMenu" class="btn btn-outline-light">
                ← Volver al Inicio
            </a>
        </div>
    </div>

    <!-- Buscador -->
    <form method="get" action="<?= RUTA_URL ?>/MateriaController/modificarMaterias" class="row g-3 mb-4 text-white">
        <div class="col-md-8">
            <label for="nombre" class="form-label">Buscar por nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>" placeholder="Ej. Programación">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <!-- Mensajes -->
    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorRegistro'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['errorRegistro']; unset($_SESSION['errorRegistro']); ?></div>
    <?php endif; ?>

    <!-- Lista de materias -->
    <?php if (empty($materias)): ?>
        <div class="alert alert-warning">No se encontraron materias con ese nombre.</div>
    <?php else: ?>
        <ul class="list-group shadow">
            <?php foreach ($materias as $m): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= htmlspecialchars($m->nombreMateria) ?></span>
                    <div class="d-flex gap-2">
                        <a href="<?= RUTA_URL ?>/MateriaController/editarMateria/<?= $m->idMateria ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="<?= RUTA_URL ?>/MateriaController/eliminarMateria/<?= $m->idMateria ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
