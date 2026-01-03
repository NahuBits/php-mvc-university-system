<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('<?= RUTA_URL ?>/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; padding: 20px;">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0 text-white">Carreras Eliminadas</h2>
        <a href="<?= RUTA_URL ?>/AdminController/listarCarrerasParaEditar" class="btn btn-outline-primary">← Volver al listado</a>
    </div>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorRegistro'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['errorRegistro']; unset($_SESSION['errorRegistro']); ?></div>
    <?php endif; ?>

    <?php if (empty($carreras)): ?>
        <div class="alert alert-info">No hay carreras eliminadas.</div>
    <?php else: ?>
        <ul class="list-group shadow">
            <?php foreach ($carreras as $c): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= htmlspecialchars($c->nombreCarrera) ?></strong>
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
                    </div>
                    <a href="<?= RUTA_URL ?>/AdminController/activarCarrera/<?= $c->idCarrera ?>" class="btn btn-sm btn-success">
                        Dar de Alta
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>