<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Fondo general -->
<div style="background-image: url('img/IMGDeFondo.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">

  <!-- Carrusel -->
  <div id="carouselUTN" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselUTN" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/GrupoEstudiantes.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Cursos" loading="lazy">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">PROGRAMAS ACADÉMICOS DE EXCELENCIA</h5>
          <p class="text-white">Transformá tu futuro con cursos innovadores en tecnología, ciencia e ingeniería.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/EdificioUni.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Estudiante" loading="lazy">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">INSCRIPCIONES ABIERTAS</h5>
          <p class="text-white">Sumate hoy y empezá a construir un futuro profesional brillante.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/grupo.jpg" class="d-block w-100" style="object-fit: cover; height: 500px;" alt="Grupo de estudiantes" loading="lazy">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
          <h5 class="text-white fw-bold">TU FUTURO ESTÁ AQUÍ</h5>
          <p class="text-white">Aprendé en un entorno que potencia tu creatividad y colaboración.</p>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselUTN" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselUTN" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <!-- Carreras -->
  <section class="py-5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
    <div class="container py-4">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <!-- Grado -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-teal-400 to-green-500 d-flex flex-column">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenGrado.jpeg" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Carreras de Grado">
            <div class="card-body text-center d-flex flex-column justify-content-between">
              <h5 class="card-title fw-bold text-black">Carreras de Grado</h5>
              <p class="card-text flex-grow-1">Programas universitarios enfocados en ciencia y tecnología para tu desarrollo profesional.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/infoCarrerasDeGrado" class="btn fw-bold px-4 py-2 mt-3 rounded-pill shadow-sm" style="background-color: #000; color: #fff; border: 2px solid #fff;">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Post-Grado -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-pink-400 to-purple-500 d-flex flex-column">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenPostGrado.jpg" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Carreras de Post-Grado">
            <div class="card-body text-center d-flex flex-column justify-content-between">
              <h5 class="card-title fw-bold text-black">Carreras de Post-Grado</h5>
              <p class="card-text flex-grow-1">Especializaciones para potenciar tu carrera con conocimientos avanzados y actualizados.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/infoPostGrado" class="btn fw-bold px-4 py-2 mt-3 rounded-pill shadow-sm" style="background-color: #000; color: #fff; border: 2px solid #fff;">Ver más</a>
            </div>
          </div>
        </div>

        <!-- Cursos -->
        <div class="col d-flex align-items-stretch">
          <div class="card h-100 border-0 shadow-lg rounded-3 bg-gradient-to-r from-orange-400 to-yellow-500 d-flex flex-column">
            <img src="<?php echo RUTA_URL; ?>/img/ImagenCursos.jpg" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="Cursos a distancia">
            <div class="card-body text-center d-flex flex-column justify-content-between">
              <h5 class="card-title fw-bold text-black">Cursos a Distancia</h5>
              <p class="card-text flex-grow-1">Capacitate online en áreas tecnológicas, con flexibilidad y calidad académica.</p>
              <a href="<?php echo RUTA_URL; ?>/Pages/InfoCursos" class="btn fw-bold px-4 py-2 mt-3 rounded-pill shadow-sm" style="background-color: #000; color: #fff; border: 2px solid #fff;">Ver más</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Información universidad -->
  <section class="container my-5 py-4 px-3 bg-gradient-to-r from-gray-100 to-gray-300 rounded shadow-lg seccion-universidad">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="img/ImaUniversi.jpg" alt="Universidad" class="img-fluid rounded-3 w-100 shadow-sm">
      </div>
      <div class="col-lg-6">
        <h2 class="mb-3 fw-bold text-primary">Universidad Tecnológica Nacional: Innovación que transforma</h2>
        <p class="mb-4 text-muted">Formamos profesionales altamente capacitados en ciencia, ingeniería y tecnología, con un enfoque práctico, multidisciplinario y adaptado al futuro del trabajo.</p>
        <a href="<?php echo RUTA_URL; ?>/AuthController/loginUsuario" class="btn" style="background: rgba(0, 0, 0, 0.5); border: 1px solid rgba(255, 255, 255, 0.5); color: white;">Acceder a mi cuenta</a>
      </div>
    </div>
  </section>

<section class="container my-5 py-4 px-3 bg-gradient-to-r from-teal-100 to-teal-200 rounded shadow-lg seccion-contenedor">
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">Últimas Novedades</h2>
  </div>

  <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

    <?php $first = true; ?>
    <?php foreach ($novedades as $nv): ?>
        <div class="carousel-item <?= $first ? 'active' : '' ?>">
            <div class="p-4 border rounded bg-white text-center shadow-sm">
               <h4 class="fw-bold text-primary"><?php echo htmlspecialchars($nv->Titulo); ?></h4>
                <p><?php echo htmlspecialchars($nv->Descripcion); ?></p>
            </div>
        </div>
  <?php $first = false; ?>
  <?php endforeach; ?>
  
  
    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</section>



  <!-- Programas académicos (Imagenes al pasar cursor)-->
<!-- Programas académicos -->
<section class="container my-5 py-4 px-3 bg-gradient-to-r from-teal-100 to-teal-200 rounded shadow-lg seccion-contenedor">
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">Programas Académicos en Ciencia y Tecnología</h2>
    <p class="p-2" style="color: white !important;">Desarrollamos talento para liderar la transformación digital y la innovación en la industria moderna.</p>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 text-center">

    <!-- Ingeniería en Software -->
    <div class="col-md-4 mb-4">
      <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">
        <img src="img/ProgrAcadeIngSoft.jpg"
             alt="Imagen Ingeniería en Software"
             class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
             style="object-fit: cover;">
        <div class="testimonio-content">
          <h4 class="mb-3 text-primary">Ingeniería en Software</h4>
          <p class="text-muted">Diseño, desarrollo y gestión de sistemas y aplicaciones. Capacitación en lenguajes modernos, metodologías ágiles y arquitectura de software.</p>
        </div>
      </div>
    </div>

    <!-- Ciencia de Datos e Inteligencia Artificial -->
    <div class="col-md-4 mb-4">
      <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">
        <img src="img/ProgrAcadeIntArtificial.jpg"
             alt="Imagen Ciencia de Datos"
             class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
             style="object-fit: cover;">
        <div class="testimonio-content">
          <h4 class="mb-3 text-primary">Ciencia de Datos e Inteligencia Artificial</h4>
          <p class="text-muted">Formación en análisis de datos, machine learning y algoritmos inteligentes. Aplicaciones en industria, salud, finanzas y más.</p>
        </div>
      </div>
    </div>

    <!-- Ingeniería en Robótica y Automatización -->
    <div class="col-md-4 mb-4">
      <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">
        <img src="img/ProgrAcadeRobotica.jpg"
             alt="Imagen Robótica"
             class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
             style="object-fit: cover;">
        <div class="testimonio-content">
          <h4 class="mb-3 text-primary">Ingeniería en Robótica y Automatización</h4>
          <p class="text-muted">Estudios avanzados en sistemas ciberfísicos, robótica industrial, sensores inteligentes y automatización de procesos.</p>
        </div>
      </div>
    </div>

  </div>
</section>


  <!-- Testimonios -->
  <section class="container my-5 py-4 px-3 bg-gradient-to-r from-teal-100 to-teal-200 rounded shadow-lg seccion-contenedor">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Testimonios De Estudiantes</h2>
      <p class="p-2" style="color: white !important;">Conocé las experiencias de quienes ya están transformando su futuro con nosotros.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
    <div class="col">
  <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">

    <!-- Imagen que se muestra al hacer hover -->
    <img src="<?php echo RUTA_URL; ?>/img/Testinomio-LauraGomez.jpg"
         alt="Foto de Laura Gómez"
         class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
         style="object-fit: cover;">

    <!-- Contenido -->
    <div class="testimonio-content position-relative">
      <h4 class="mb-3 text-dark">Laura Gómez</h4>
      <p class="text-muted">"La UTN me abrió las puertas a una carrera en tecnología inimaginable."</p>
      <span class="text-muted small">Ingeniera en Sistemas</span>
    </div>

  </div>
</div>


<div class="col">
  <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">

    
    <img src="<?php echo RUTA_URL; ?>/img/Testimonio-JuanPerez.jpg"
         alt="Foto de Juan Perez"
         class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
         style="object-fit: cover;">

    
    <div class="testimonio-content position-relative">
      <h4 class="mb-3 text-dark">Juan Perez</h4>
      <p class="text-muted">""Gracias a los cursos online pude capacitarme mientras trabajaba.""</p>
      <span class="text-muted small">Desarrollador Web</span>
    </div>

  </div>
</div>

<div class="col">
  <div class="testimonio-card p-4 h-100 border rounded shadow-lg bg-white position-relative overflow-hidden">

    
    <img src="<?php echo RUTA_URL; ?>/img/Testimonio-MariaLopez.jpg"
         alt="Foto de Maria Lopez"
         class="testimonio-img position-absolute top-0 start-0 w-100 h-100"
         style="object-fit: cover;">

    
    <div class="testimonio-content position-relative">
      <h4 class="mb-3 text-dark">Maria Lopez</h4>
      <p class="text-muted">"Los Docentes y recursos estan a nivel internacional."</p>
      <span class="text-muted small">Magister en IA</span>
    </div>

  </div>
</div>

  </section>

  <!-- Noticias -->


 <!-- Botón Volver Arriba -->
<button id="btnVolverArriba" class="btn-scroll-top" title="Volver arriba">
    ↑
</button>
<script src="<?php echo RUTA_URL?>/public/js/btnArriba.js"></script>
  <!-- Footer -->
  <?php require RUTA_APP . '/views/layout/footer.php'; ?>

</div>
