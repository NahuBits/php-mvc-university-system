<?php require RUTA_APP . '/views/layout/users/header.php'; ?>


<div style="background-image: url('<?= RUTA_URL ?>/img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">
    <div class="container mt-4" style="max-width: 700px;">
        <!-- Mensajes -->
    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorRegistro'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['errorRegistro']; unset($_SESSION['errorRegistro']); ?></div>
    <?php endif; ?>
    
        <div class="card p-4" style="background-color: rgba(0, 0, 0, 0.75); border-radius: 10px; color: white;">
            <h2 class="text-center mb-4">Editar Carrera</h2>

            <form action="<?= RUTA_URL; ?>/AdminController/guardarEdicionCarrera" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idCarrera" value="<?= $carrera->idCarrera ?>">
                <input type="hidden" name="imagen_actual" value="<?= $carrera->rutaImagenMuestra ?>">

                <div class="form-group mb-3">
                    <label for="nombreCarrera">Nombre de la carrera:</label>
                    <input type="text" name="nombreCarrera" id="nombreCarrera" class="form-control" required value="<?= htmlspecialchars($carrera->nombreCarrera) ?>">
                </div>
                
                <div class="form-group mb-3">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required><?= htmlspecialchars($carrera->descripcionMuestra) ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcionCompleta">Descripción Completa:</label>
                    <textarea name="descripcionCompleta" id="descripcionCompleta" class="form-control" required><?= htmlspecialchars($carrera->descripcionCompletaSideBar) ?></textarea>
                </div>
                
                <div class="form-group mb-3">
                    <label for="tipoCarrera">Tipo de carrera:</label>
                    <select name="tipoCarrera" id="tipoCarrera" class="form-control" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="Curso" <?= $carrera->tipoCarrera === 'Curso' ? 'selected' : '' ?>>Curso</option>
                        <option value="Grado" <?= $carrera->tipoCarrera === 'Grado' ? 'selected' : '' ?>>Grado</option>
                        <option value="PosGrado" <?= $carrera->tipoCarrera === 'PosGrado' ? 'selected' : '' ?>>Posgrado</option>
                    </select>
                </div>

                <div class="form-group mb-3" id="campoDuracionAnios" style="display: none;">
                    <label for="duracion_anios">Duración (en años):</label>
                    <select name="duracion_anios" id="duracion_anios" class="form-control">
                        <option value="">Seleccione...</option>
                        <?php for ($i = 1; $i <= 6; $i++): ?>
                            <option value="<?= $i ?>" <?= ($carrera->duracion_anios == $i) ? 'selected' : '' ?>>
                                <?= $i ?> año<?= $i > 1 ? 's' : '' ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group mb-3" id="campoDuracionMeses" style="display: none;">
                    <label for="duracion_meses">Duración (en meses):</label>
                    <select name="duracion_meses" id="duracion_meses" class="form-control">
                        <option value="">Seleccione...</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>" <?= ($carrera->duracion_meses == $i) ? 'selected' : '' ?>>
                                <?= $i ?> mes<?= $i > 1 ? 'es' : '' ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen actual:</label><br>
                    <img src="<?= RUTA_URL ?>/img/carrera/<?= $carrera->rutaImagenMuestra ?>" width="100" class="mb-2">
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Guardar Cambios</button>
                <a href="<?= RUTA_URL ?>/AdminController/listarCarrerasParaEditar" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<!-- Ruta JS -->
<script src="<?php echo RUTA_URL?>/public/js/carreraDuracion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
