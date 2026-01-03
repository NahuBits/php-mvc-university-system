<!-- header para usuarios -->
<?php require RUTA_APP . '/views/layout/users/header.php'; ?>
<?php
if (!isset($_SESSION['tipoUsuario']) == 'admin') {
    $this->view('pages/auth/login');
    exit;
}
?>
<div style="background-image: url('../img/agregarCarrerasBackground.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px;">
<div class="container mt-5">


        <?php if (!isset($mensaje)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <?php if (!isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    <div class="card shadow-lg p-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); color: white;">
        <h2 class="mb-4">Editar materia dictado.</h2>

        <form action="<?= RUTA_URL; ?>/MateriaController/editarMateriaDictado" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($MateriaDictado->IDMateriaDetalle); ?>">
            <div class="mb-3">
                <label for="idCarrera" class="form-label">Carrera</label>
                <select id="idCarrera" name="idCarrera" class="form-select" required>
                    <option value="">--Seleccione una carrera--</option>
                    <?php foreach($carreras as $carrera): ?>
                        <option value="<?= $carrera->idCarrera ?>" <?= $carrera->idCarrera == $MateriaDictado->idCarrera ? 'selected' : '' ?>>
                        <?= htmlspecialchars($carrera->nombreCarrera) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="idMateria" class="form-label">Materia</label>
                <select id="idMateria" name="idMateria" class="form-select" required>
                    <option value="">--Seleccione una materia--</option>
                    <?php foreach($materias as $materia): ?>
                        <option value="<?= $materia->idMateria ?>" <?= $materia->idMateria == $MateriaDictado->idMateria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($materia->nombreMateria) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="duracionCarrera" class="form-label">Duración estimada</label>
                <input type="text" id="duracionCarrera" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label for="idProfesor" class="form-label">Profesor</label>
                <select id="idProfesor" name="idProfesor" class="form-select" required>
                    <option value="">--Seleccione un profesor--</option>
                    <?php foreach($profesores as $profesor): ?>
                        <option value="<?= $profesor->idUsuario ?>" <?= $profesor->idUsuario == $MateriaDictado->idProfesor ? 'selected' : '' ?>>
                        <?= htmlspecialchars($profesor->Nombre) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3" id="cuatrimestreContainer">
                <label for="cuatrimestre" class="form-label">Cuatrimestre</label>
                <select id="cuatrimestre" name="cuatrimestre" class="form-select">
                    <option value="">--Seleccione cuatrimestre--</option>
                    <!-- Las opciones se cargarán dinámicamente -->
                </select>
            </div>


            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <select id="turno" name="turno" class="form-select" required>
                    <option value="">--Seleccione turno--</option>
                    <option value="Mañana" <?= $MateriaDictado->turno === 'Mañana' ? 'selected' : '' ?>>Mañana</option>
                    <option value="Tarde" <?= $MateriaDictado->turno === 'Tarde' ? 'selected' : '' ?>>Tarde</option>
                    <option value="Noche" <?= $MateriaDictado->turno === 'Noche' ? 'selected' : '' ?>>Noche</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="horaInicio" class="form-label">Hora de inicio</label>
                <select id="horaInicio" name="horaInicio" class="form-select" required></select>
            </div>

            <div class="mb-3">
                <label for="horaFin" class="form-label">Hora de fin</label>
                <select id="horaFin" name="horaFin" class="form-select" required></select>
            </div>

                <?php
                 $diasSeleccionados = explode(', ', $MateriaDictado->DiaCursada);
                ?>

                <div class="mb-3">
                    <label class="form-label">Día/s de cursada</label>
                <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="diaCursada[]" id="lunes" value="Lunes"
                        <?= in_array('Lunes', $diasSeleccionados) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="lunes">Lunes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="diaCursada[]" id="martes" value="Martes"
                        <?= in_array('Martes', $diasSeleccionados) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="martes">Martes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="diaCursada[]" id="miercoles" value="Miércoles"
                        <?= in_array('Miércoles', $diasSeleccionados) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="miercoles">Miércoles</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="diaCursada[]" id="jueves" value="Jueves"
                        <?= in_array('Jueves', $diasSeleccionados) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="jueves">Jueves</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="diaCursada[]" id="viernes" value="Viernes"
                        <?= in_array('Viernes', $diasSeleccionados) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="viernes">Viernes</label>
                </div>
            
    </div>
    </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success w-100 mt-3">Editar Materia dictado</button>
                
                <a href="<?= RUTA_URL; ?>/Pages/UsuarioMenu" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
</div>
</div>
<!-- pasamos si es curso o carrera, asi se carga la duracion en semanas o cuatrimestres -->
<script>
window.carrerasData = <?= json_encode($carreras) ?>;
</script>
  <script src="<?php echo RUTA_URL?>/public/js/horarioMateria.js"></script>
  <script src="<?php echo RUTA_URL?>/public/js/duracionCarrera.js"></script>                     
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
</html>