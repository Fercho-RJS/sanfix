<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>

  <!-- Estilos compartidos -->
  <?php require_once __DIR__ . '/pages/shared/styles.php'; ?>

  <!-- Estilos específicos -->
  <link rel="stylesheet" href="sanfix/style/custom-index.css">
</head>

<body class="bg-light">
  <?php require_once __DIR__ . '/pages/shared/header.php'; ?>
  <?php require_once __DIR__ . '/pages/shared/navbar.php'; ?>

  <div class="row w-100">
    <?php require_once __DIR__ . '/pages/shared/lateral.php' ?>
    <div class="col-9">
      <main class="bg-dark my-4 py-4"> <!-- Inicio del ontenido de ésta web -->
        <p><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur porro saepe expedita maiores nihil doloremque esse qui fugiat quo sed excepturi eligendi, minima numquam vel dicta quasi consequuntur. Aut, praesentium.</span><span>Ratione molestias suscipit odio natus praesentium et voluptates a architecto laborum eaque fugiat aperiam voluptatem ea quos fugit aliquam veniam non, optio debitis laboriosam explicabo aspernatur! Vitae perspiciatis non quo.</span><span>Illum deleniti consequuntur asperiores. Natus dolorum vel asperiores minus, soluta modi accusantium ullam temporibus harum deleniti numquam dolore et rerum voluptatibus non recusandae nisi magnam minima rem officia corrupti quod.</span></p>
      </main> <!-- Fin del contenido de ésta web -->
    </div>
  </div>

  <?php require_once __DIR__ . '/pages/shared/footer.php'; ?>
</body>

<!-- Scripts compartidos -->
<?php require_once __DIR__ . '/pages/shared/scripts.php'; ?>

<!-- Scripts específicos -->
<script src="sanfix/scripts/custom-index.js"></script>

</html>