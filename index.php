<!DOCTYPE html>
<html lang="es">

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

  <div class="row w-100">
    <?php require_once __DIR__ . '/pages/shared/lateral.php' ?>
    <div class="col-9">
      <main class="my-2 py-2"> <!-- Inicio del ontenido de ésta web -->
        <h1 class="bg-primary p-3 fw-bold">Generar recibo de dispositivo</h1>

        <?php include './pages/forms/nuevo-recibo.php'; ?>
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