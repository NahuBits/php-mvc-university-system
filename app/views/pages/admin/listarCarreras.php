<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('<?= RUTA_URL ?>/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-white">Gestión de Carreras</h2>
        <div>
            <a href="<?= RUTA_URL ?>/AdminController/listarCarrerasEliminadas" class="btn btn-outline-light me-2">
                <i class="bi bi-archive"></i> Ver Carreras Eliminadas
            </a>
            <a href="<?= RUTA_URL ?>/Pages/UsuarioMenu" class="btn btn-outline-light">
                ← Volver al Inicio
            </a>
        </div>
    </div>

    <!-- Mensajes -->
    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorRegistro'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['errorRegistro']; unset($_SESSION['errorRegistro']); ?></div>
    <?php endif; ?>

    <!-- Filtros -->
    <form method="get" action="<?= RUTA_URL ?>/AdminController/listarCarrerasParaEditar" class="row g-3 mb-4 text-white">
        <div class="col-md-4">
            <label for="nombre" class="form-label text-white">Buscar por nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>">
        </div>
        <div class="col-md-4">
            <label for="filtro" class="form-label text-white">Filtrar por tipo:</label>
            <select name="filtro" id="filtro" class="form-select">
                <option value="">Todos</option>
                <option value="Curso" <?= $filtro === 'Curso' ? 'selected' : '' ?>>Cursos</option>
                <option value="Grado" <?= $filtro === 'Grado' ? 'selected' : '' ?>>Grado</option>
                <option value="PosGrado" <?= $filtro === 'PosGrado' ? 'selected' : '' ?>>Posgrado</option>
            </select>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Aplicar Filtros</button>
        </div>
    </form>

    <!-- Resultados -->
    <?php if (empty($carreras)): ?>
        <div class="alert alert-warning">No se encontraron carreras con esos filtros.</div>
    <?php else: ?>
        <ul class="list-group shadow">
            <?php foreach ($carreras as $c): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <?php
                        // Diferente color por tipo
                        $badgeClass = match ($c->tipoCarrera) {
                            'Curso' => 'bg-warning text-dark',
                            'Grado' => 'bg-primary',
                            'Posgrado' => 'bg-success',
                            default => 'bg-secondary'
                        };
                        ?>
                        <span class="badge <?= $badgeClass ?> ms-2"><?= $c->tipoCarrera ?></span>
                        <strong><?= htmlspecialchars($c->nombreCarrera) ?></strong>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="<?= RUTA_URL ?>/AdminController/editarCarrera/<?= $c->idCarrera ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="<?= RUTA_URL ?>/AdminController/eliminarCarrera/<?= $c->idCarrera ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta carrera?')">
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