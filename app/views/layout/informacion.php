<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Sección de Información -->
<section class="py-5 bg-gradient-to-r from-indigo-600 to-blue-700 text-white" id="universidadInfo">
  <div class="container py-4">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white">Preguntas Frecuentes</h2>
      <p class="text-muted">Aquí puedes encontrar las respuestas a las dudas más comunes sobre nuestros programas académicos y servicios.</p>
    </div>

    <!-- Acordeón de Preguntas Frecuentes -->
    <div class="accordion" id="faqAccordion">

      <!-- Pregunta 1 -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button bg-dark text-white shadow-sm rounded-3 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-question-circle me-2"></i> ¿Cuáles son los requisitos para ingresar a la universidad?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body bg-light text-dark p-3 rounded-bottom">
            Para ingresar a la Universidad Tecnológica Nacional, debes cumplir con los requisitos de inscripción que incluyen la finalización del nivel secundario y la presentación de los documentos solicitados según el programa elegido. Además, puedes necesitar rendir exámenes de admisión dependiendo del programa.
          </div>
        </div>
      </div>

      <!-- Pregunta 2 -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button bg-dark text-white shadow-sm rounded-3 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-question-circle me-2"></i> ¿Cómo puedo postularme para un curso a distancia?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body bg-light text-dark p-3 rounded-bottom">
            Puedes postularte a nuestros cursos a distancia a través de nuestro portal web. En la sección de "Cursos", encontrarás la opción para registrarte y acceder a toda la información necesaria para completar tu inscripción en línea.
          </div>
        </div>
      </div>

      <!-- Pregunta 3 -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button bg-dark text-white shadow-sm rounded-3 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="fas fa-question-circle me-2"></i> ¿Cuáles son los programas de posgrado disponibles?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body bg-light text-dark p-3 rounded-bottom">
            Ofrecemos varios programas de posgrado en áreas como Inteligencia Artificial, Ciencia de Datos, y Robótica, entre otros. Puedes consultar todos los programas disponibles en nuestra página de Post-Grado, donde podrás encontrar detalles sobre cada uno.
          </div>
        </div>
      </div>

      <!-- Pregunta 4 -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button bg-dark text-white shadow-sm rounded-3 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <i class="fas fa-question-circle me-2"></i> ¿Existen becas o ayudas económicas?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body bg-light text-dark p-3 rounded-bottom">
            Sí, contamos con diversas becas y ayudas económicas para estudiantes de bajos recursos o con buen rendimiento académico. Visita nuestra página de "Becas y Ayudas" para más información sobre los requisitos y cómo postularte.
          </div>
        </div>
      </div>

      <!-- Pregunta 5 -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button bg-dark text-white shadow-sm rounded-3 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <i class="fas fa-question-circle me-2"></i> ¿Qué duración tienen los programas de grado y posgrado?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
          <div class="accordion-body bg-light text-dark p-3 rounded-bottom">
            Los programas de grado tienen una duración aproximada de 4 a 5 años dependiendo de la carrera. Los programas de posgrado suelen durar entre 1 y 2 años, según el área de especialización.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require RUTA_APP . '/views/layout/footer.php'; ?>
