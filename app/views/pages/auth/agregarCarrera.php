<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">
    <div class="container mt-4" style="max-width: 700px;">
        <div class="card p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">
            <h2 class="text-center mb-4">Agregar Nueva Carrera</h2>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-info"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>

            <?php if (!empty($errorRegistro)): ?>
                <?= $errorRegistro ?>
            <?php endif; ?>

            <form action="<?php echo RUTA_URL; ?>/AdminController/agregarCarrera" method="POST" enctype="multipart/form-data">
                
                <div class="form-group mb-3">
                    <label for="nombreCarrera">Nombre de la carrera:</label>
                    <input type="text" name="nombreCarrera" id="nombreCarrera" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcionCompleta">Descripción Completa:</label>
                    <textarea name="descripcionCompleta" id="descripcionCompleta" class="form-control" required></textarea>
                </div>
                
                <div class="form-group mb-3">
                    <label for="tipoCarrera">Tipo de carrera:</label>
                    <select name="tipoCarrera" id="tipoCarrera" class="form-control" onchange="mostrarCampoDuracion()" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="Curso">Curso</option>
                        <option value="Grado">Grado</option>
                        <option value="PosGrado">Posgrado</option>
                    </select>
                </div>

                <!-- Campo para duración en años (Grado / Posgrado) -->
                <div class="form-group mb-3" id="campoDuracionAnios" style="display: none;">
                    <label for="duracion_anios">Duración (en años):</label>
                    <select name="duracion_anios" id="duracion_anios" class="form-control">
                    <option value="">Seleccione...</option>
                        <?php for ($i = 1; $i <= 6; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> año<?= $i > 1 ? 's' : '' ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <!-- Campo para duración en meses (Curso) -->
                <div class="form-group mb-3" id="campoDuracionMeses" style="display: none;">
                    <label for="duracion_meses">Duración (en meses):</label>
                    <select name="duracion_meses" id="duracion_meses" class="form-control">
                    <option value="">Seleccione...</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> mes<?= $i > 1 ? 'es' : '' ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen de la carrera:</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Agregar Carrera</button>
                <a href="<?php echo RUTA_URL; ?>/Pages/UsuarioMenu" class="btn btn-secondary w-100 mt-3">Regresar</a>
            </form>
        </div>
    </div>
</div>


<script src="<?php echo RUTA_URL?>/public/js/carreraDuracion.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>


