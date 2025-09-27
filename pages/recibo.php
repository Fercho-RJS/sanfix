<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>

  <!-- Estilos compartidos -->
  <?php require_once './shared/styles.php'; ?>

  <!-- Estilos específicos -->
  <link rel="stylesheet" href="sanfix/style/custom-index.css">
</head>

<body class="bg-dark">
  <?php require_once './shared/header.php'; ?>

  <main class="container bg-body my-3 p-4 rounded-4"> <!-- Inicio del ontenido de ésta web -->
    <h1 class="bg-primary p-3 fw-bold">Generar recibo de dispositivo</h1>

    <?php include './forms/nuevo-recibo.php'; ?>
  </main> <!-- Fin del contenido de ésta web -->


  <?php require_once __DIR__ . '/shared/footer.php'; ?>
</body>

<!-- Scripts compartidos -->
<?php require_once './shared/scripts.php'; ?>

<!-- Scripts específicos -->
<script src="sanfix/scripts/custom-index.js"></script>

</html>