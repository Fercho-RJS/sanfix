<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Presupuesto</title>

  <!-- Estilos compartidos -->
  <?php require_once './shared/styles.php'; ?>

  <!-- Estilos específicos -->
  <link rel="stylesheet" href="sanfix/style/custom-index.css">
</head>

<body class="bg-dark">
  <?php require_once './shared/header.php'; ?>

  <main class="container bg-body my-3 p-4 rounded-4"> <!-- Inicio del ontenido de ésta web -->
    <h1 class="bg-primary p-3 fw-bold">Presupuesto</h1>

    <?php include './forms/nuevo-presupuesto.php'; ?>

    <h1 class="bg-primary p-3 fw-bold mt-3">Resultado</h1>

    <?php
    // Verifica que se haya enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Recupera los valores del formulario
      $mano_obra = isset($_POST['mano_obra']) ? floatval($_POST['mano_obra']) : 0;
      $envio_proveedor = isset($_POST['envio_proveedor']) ? floatval($_POST['envio_proveedor']) : 0;
      $rep_mla = isset($_POST['rep_mla']) ? floatval($_POST['rep_mla']) : 0;
      $rep_proveedor = isset($_POST['rep_proveedor']) ? floatval($_POST['rep_proveedor']) : 0;
      $proveedor_nombre = isset($_POST['proveedor_nombre']) ? trim($_POST['proveedor_nombre']) : '';
      $error = [];

      // Validación
      if (!($rep_mla > $rep_proveedor)) {
        $error[] = 'Aviso: El valor de MercadoLibre es menor que el del proveedor.';
      }

      // Cálculo de total
      $total_general = $mano_obra + $envio_proveedor + $rep_mla;

      //Diferencia MLA con Proveedor
      $dif_proveedor_mla = $rep_mla - $rep_proveedor;

      // Cálculo de costos
      $mis_costos = $rep_proveedor + $envio_proveedor;

      // Cálculo de ganancia
      $ganancia = $total_general - $mis_costos;

      // Mostrar errores si existen
      foreach ($error as $mensaje) {
        echo '<div class="alert alert-warning" role="alert">' . htmlspecialchars($mensaje) . '</div>';
      }

      echo '<div class="row mt-3 p-2 m-0">';
      echo '  <div class="col-6">';
      echo '    <label class="fw-bold mb-2">Mano de obra ($):</label>';
      echo '    <input type="text" class="form-control money-format" value="' . number_format($mano_obra, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '  <div class="col-6">';
      echo '    <label class="fw-bold mb-2">Envío proveedor ($):</label>';
      echo '    <input type="text" class="form-control money-format" value="' . number_format($envio_proveedor, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '</div>';

      echo '<div class="row mt-3 p-2 m-0">';
      echo '  <div class="col-6">';
      echo '    <label class="fw-bold mb-2">Repuesto MercadoLibre ($):</label>';
      echo '    <input type="text" class="form-control money-format" value="' . number_format($rep_mla, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '  <div class="col-6">';
      echo '    <label class="fw-bold mb-2">Repuesto proveedor ($):</label>';
      echo '    <input type="text" class="form-control money-format" value="' . number_format($rep_proveedor, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '</div>';

      echo '<div class="row mt-3 p-2 m-0">';
      echo '  <div class="col-12">';
      echo '    <label class="fw-bold mb-2 text-primary">Diferencia MercadoLibre vs Proveedor ($):</label>';
      echo '    <input type="text" class="form-control money-format" value="' . number_format($dif_proveedor_mla, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '</div>';


      echo '<div class="row mt-3 p-2 m-0">';
      echo '  <div class="col-12">';
      echo '    <label class="fw-bold mb-2">Proveedor / Tienda:</label>';
      echo '    <input type="text" class="form-control" value="' . htmlspecialchars($proveedor_nombre) . '" readonly>';
      echo '  </div>';
      echo '</div>';

      echo '<div class="row mt-3 p-2 m-0">';
      echo '  <div class="col-6">';
      echo '    <label for="ganancia" class="fw-bold mb-2 text-success">Ganancias ($):</label>';
      echo '    <input type="text" name="ganancia" id="ganancia" class="w-100 form-control money-format" value="' . number_format($ganancia, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '  <div class="col-6">';
      echo '    <label for="costos" class="fw-bold mb-2 text-danger">Mis costos (-$):</label>';
      echo '    <input type="text" name="costos" id="costos" class="w-100 form-control money-format" value="' . number_format($mis_costos, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '</div>';

      echo '<div class="row mt-1 p-2 m-0">';
      echo '  <div class="col-12">';
      echo '    <label for="total" class="fw-bold mb-2">Total del cliente ($)</label>';
      echo '    <input type="text" name="total" id="total" class="form-control w-100 money-format" value="' . number_format($total_general, 2, '.', '') . '" readonly>';
      echo '  </div>';
      echo '</div>';
    } else {
      echo "<p class='text-danger'>No se recibieron datos del formulario.</p>";
    }
    ?>

  </main> <!-- Fin del contenido de ésta web -->


  <?php require_once __DIR__ . '/shared/footer.php'; ?>
</body>

<!-- Scripts compartidos -->
<?php require_once 'shared/scripts.php'; ?>

<!-- Scripts específicos -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const moneyInputs = document.querySelectorAll('.money-format');

    moneyInputs.forEach(input => {
      const rawValue = parseFloat(input.value);
      if (!isNaN(rawValue)) {
        input.value = rawValue.toLocaleString('es-AR', {
          style: 'currency',
          currency: 'ARS',
          minimumFractionDigits: 2
        });
      }
    });
  });
</script>

</html>