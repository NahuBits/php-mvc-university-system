<div style="background-image: url('../img/uniDefondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Botón moderno "Volver al Inicio" debajo del header -->
<div class="container mt-4">
  <a href="<?php echo RUTA_URL; ?>" 
     class="btn px-4 py-2 rounded-pill shadow"
     style="background-color: rgba(14, 0, 0, 0.397); color: white; font-weight: bold; border: 1px solid rgba(255,255,255,0.3);">
    ← Volver al Inicio
  </a>
</div>

<div class="container my-5">
  <div class="row" id="courseContainer">
    <?php if (!empty($data['infoPostGrado'])): ?>
      <?php foreach ($data['infoPostGrado'] as $infoPostGrado): ?>
        <div class="col-md-4 mb-4">
          <div class="card course-card"
               data-title="<?php echo $infoPostGrado['titulo']; ?>"
               data-image="<?php echo RUTA_URL . '/public/img/' . $infoPostGrado['imagen']; ?>"
               data-description="<?php echo $infoPostGrado['descripcion']; ?>"
               data-full-description="<?php echo htmlspecialchars($infoPostGrado['descripcionCompleta'], ENT_QUOTES, 'UTF-8'); ?>"
               onclick="openCourse(this)">
            <img src="<?php echo RUTA_URL . '/public/img/' . $infoPostGrado['imagen']; ?>" class="card-img-top" alt="<?php echo $infoPostGrado['titulo']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $infoPostGrado['titulo']; ?></h5>
              <p class="card-text"><?php echo $infoPostGrado['descripcion']; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No hay carreras disponibles en este momento.</p>
    <?php endif; ?>
  </div>
</div>

<!-- Sidebar con información detallada -->
<div id="mySidebar" class="sidebar" aria-hidden="true">
  <a href="javascript:void(0)" class="closebtn" onclick="closeCourse()">&times;</a>
  <h3 id="courseTitle"></h3>
  <img id="courseImage" class="course-image" src="" alt="">
  <p id="courseDescription"></p>
</div>

<!-- Ruta JS -->
<script src="<?php echo RUTA_URL?>/public/js/infoSidebar.js"></script>

<?php require RUTA_APP .'/views/layout/footer.php'; ?>
</div>
