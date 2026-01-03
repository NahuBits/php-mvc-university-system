<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/infoStyle.css">
  <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/style.css">
  <link rel="icon" href="<?php echo RUTA_URL?>/public/img/utnBlanco.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <title><?php echo NOMBRESITIO;?></title>


</head>
<body>

<script src="<?php echo RUTA_URL?>/public/js/carousel.js"></script>


<!-- Header -->
<header class="shadow-sm">
  <nav class="navbar navbar-expand-lg py-3 ">
    <div class="container-fluid">
      
      <!-- Solo logo como botón de inicio -->
      <a class="navbar-brand" href="<?php echo RUTA_URL; ?>">
        <img src="<?php echo RUTA_URL; ?>/img/utnBlanco.png" alt="UTN Logo" width="70" height="70">
      </a>

      <!-- Botón hamburguesa -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menú de navegación -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link text-white btn btn-outline-primary ms-lg-3" href="<?php echo RUTA_URL; ?>/AuthController/login">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white btn btn-outline-primary ms-lg-3" href="<?php echo RUTA_URL; ?>/AuthController/informacion">Información</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#footerinfo">Contáctanos</a>
          </li>
        
        </ul>
      </div>

    </div>
  </nav>
</header>
