<?php require RUTA_APP . '/views/layout/users/header.php'; ?>

<div style="background-image: url('<?php echo RUTA_URL; ?>/public/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px;">

    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success text-center mt-3" id="flashMessage">
            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center mt-3" id="flashMessage">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="container py-5">
        <div class="container mt-4 mb-4">
            <a href="<?php echo RUTA_URL; ?>/Pages/UsuarioMenu"
               class="btn px-4 py-2 rounded-pill shadow"
               style="background-color: rgba(14, 0, 0, 0.397); color: white; font-weight: bold; border: 1px solid rgba(255,255,255,0.3);">
                ← Volver al Inicio
            </a>
        </div>

        <h2 class="mb-4 text-center text-white">Lista de Carreras Disponibles</h2>

        <?php
        $tipos = ['Grado', 'Posgrado', 'Curso'];
        $colores = ['Grado' => 'primary', 'Posgrado' => 'warning', 'Curso' => 'info'];
        ?>

        <?php foreach ($tipos as $tipo): ?>
            <h3 class="text-capitalize text-white mb-3 mt-4"><?php echo $tipo; ?></h3>
            <div class="row g-4">
                <?php
                $hayCarrerasEnTipo = false; // Variable para controlar si hay carreras de este tipo
                foreach ($data['carreras'] as $carrera):
                    if ($carrera->tipoCarrera == $tipo):
                        $hayCarrerasEnTipo = true;
                        // Verificar si el alumno ya está inscripto en esta carrera
                        $yaInscripto = in_array($carrera->idCarrera, $data['carrerasInscriptasIds']);
                ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 d-flex flex-column">
                        <img src="<?php echo RUTA_URL . '/public/img/carrera/' . htmlspecialchars($carrera->rutaImagenMuestra); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($carrera->nombreCarrera); ?>">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($carrera->nombreCarrera); ?></h5>
                                <span class="badge bg-<?php echo $colores[$tipo]; ?> badge-tipo"><?php echo $tipo; ?></span>
                            </div>
                            <p class="card-text small text-muted flex-grow-1"><?php echo htmlspecialchars($carrera->descripcionMuestra); ?></p>

                            <?php if ($yaInscripto): ?>
                                <button class="btn btn-secondary mt-auto" disabled>Ya Inscripto</button>
                                <?php else: ?>
                                <a href="<?php echo RUTA_URL; ?>/AlumnoController/inscribirse/<?php echo $carrera->idCarrera; ?>" class="btn btn-<?php echo $colores[$tipo]; ?> btn-inscribirse mt-auto">Inscribirme</a>
                            <?php endif; ?>

                            </div>
                    </div>
                </div>
                <?php
                    endif;
                endforeach;
                // Si no se encontraron carreras para este tipo, mostrar un mensaje
                if (!$hayCarrerasEnTipo):
                ?>
                    <div class="col-12">
                        <div class="alert alert-light text-center w-100 border">No hay carreras de <?php echo strtolower($tipo); ?> disponibles.</div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.getElementById('flashMessage');
        if (flashMessage) {
            flashMessage.classList.add('show');
            setTimeout(() => {
                flashMessage.classList.remove('show');
                flashMessage.addEventListener('transitionend', () => flashMessage.remove(), { once: true });
            }, 5000);
        }
    });
</script>

