<?php require RUTA_APP . '/views/layout/header.php'; ?>

<!-- Contenedor de Preguntas Frecuentes con la clase de estilo -->
<div class="container-fluid preguntas-frecuentes d-flex justify-content-center align-items-center position-relative" style="min-height: 100vh; background: url('<?php echo RUTA_URL; ?>/public/img/IMGDeFondo.jpg') no-repeat center center fixed; background-size: cover; padding: 40px 15px;">
    <div class="card shadow-lg rounded-4 p-4 w-100">
        <div class="text-center mb-5">
            <h2 class="fw-bold">❓ Preguntas Frecuentes</h2>
            <p class="text-muted">Respuestas rápidas a tus dudas sobre nuestra universidad y sus programas.</p>
            <hr class="w-25 mx-auto">
        </div>

        <div class="accordion" id="faqAccordion">

            <!-- Pregunta 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
                        ¿Dónde puedo solicitar una beca?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Las becas se solicitan desde la Secretaría Académica. Próximamente habilitaremos una sección exclusiva para becas en nuestro sitio web.
                    </div>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Puedo estudiar a distancia?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sí, ofrecemos programas de formación online. Puedes conocerlos en la sección <a href="<?php echo RUTA_URL; ?>/Pages/InfoCursos">Cursos a Distancia</a>.
                    </div>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ¿Qué documentación debo presentar para el ingreso?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        DNI, título secundario (original y copia), foto tipo carnet y formulario de inscripción completo.
                    </div>
                </div>
            </div>

            <!-- Agrega más preguntas aquí -->

        </div>
    </div>
</div>

<!-- Footer al final de la página -->
<?php require RUTA_APP . '/views/layout/footer.php'; ?>
