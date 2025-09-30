<!DOCTYPE html>
<html lang="es" data-bs-theme="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>

  <!-- Estilos compartidos -->
  <?php require_once __DIR__ . './shared/styles.php'; ?>

  <!-- Estilos específicos -->
  <link rel="stylesheet" href="sanfix/style/custom-index.css">
</head>

<body class="bg-dark">
  <?php require_once __DIR__ . './shared/header.php'; ?>

  <main class="container bg-light my-4 p-5 rounded-4 shadow-sm">
    <h1 class="bg-primary p-3 fw-bold">Proveedores</h1>

    <?php
    require_once __DIR__ . '/../php/database-connection.php';

    // Obtener rubros únicos
    $rubros_result = $conn->query("SELECT DISTINCT rubro FROM proveedor ORDER BY rubro ASC");
    $rubros = [];
    if ($rubros_result && $rubros_result->num_rows > 0) {
      while ($r = $rubros_result->fetch_assoc()) {
        $rubros[] = $r['rubro'];
      }
    }

    // Capturar filtro seleccionado
    $filtro = isset($_GET['rubro']) ? $_GET['rubro'] : '';
    ?>

    <form method="GET" class="mb-4">
      <label for="rubro" class="form-label fw-bold">Filtrar por rubro:</label>
      <div class="input-group">
        <select name="rubro" id="rubro" class="form-select">
          <option value="">-- Todos --</option>
          <?php foreach ($rubros as $r): ?>
            <option value="<?= htmlspecialchars($r) ?>" <?= $filtro === $r ? 'selected' : '' ?>>
              <?= htmlspecialchars($r) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </div>
    </form>

    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#nuevoProveedorModal">
      Nuevo
    </button>

    <div class="modal fade" id="nuevoProveedorModal" tabindex="-1" aria-labelledby="nuevoProveedorLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="/sanfix/php/proveedor/crear-proveedor.php" method="POST" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="nuevoProveedorLabel">Nuevo proveedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="tienda" class="form-label">Nombre de la tienda</label>
              <input type="text" class="form-control" name="tienda" required>
            </div>
            <?php
            require_once __DIR__ . '/../php/database-connection.php';

            $rubros_result = $conn->query("SELECT DISTINCT rubro FROM proveedor ORDER BY rubro ASC");
            $rubros = [];
            if ($rubros_result && $rubros_result->num_rows > 0) {
              while ($r = $rubros_result->fetch_assoc()) {
                $rubros[] = $r['rubro'];
              }
            }
            ?>

            <div class="mb-3">
              <label for="rubroSelect" class="form-label">Rubro</label>
              <select name="rubroSelect" id="rubroSelect" class="form-select" onchange="toggleNuevoRubro(this.value)">
                <option value="">-- Seleccionar rubro --</option>
                <?php foreach ($rubros as $r): ?>
                  <option value="<?= htmlspecialchars($r) ?>"><?= htmlspecialchars($r) ?></option>
                <?php endforeach; ?>
                <option value="otro">Otro…</option>
              </select>
            </div>

            <div class="mb-3 d-none" id="nuevoRubroContainer">
              <label for="nuevoRubro" class="form-label">Nuevo rubro</label>
              <input type="text" class="form-control" name="nuevoRubro" id="nuevoRubro">
            </div>

            <div class="mb-3">
              <label for="url" class="form-label">URL de contacto</label>
              <input type="url" class="form-control" name="url">
            </div>
            <div class="mb-3">
              <label for="reputacion" class="form-label">Reputación (1–5 o "desconocido")</label>
              <input type="text" class="form-control" name="reputacion">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar proveedor</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>


    <?php
    $sql = "SELECT * FROM proveedor";
    if ($filtro) {
      $sql .= " WHERE rubro = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $filtro);
      $stmt->execute();
      $result = $stmt->get_result();
    } else {
      $result = $conn->query($sql);
    }

    if ($result && $result->num_rows > 0) {
      echo '<div class="table-responsive">';
      echo '<table class="table table-hover align-middle small">';
      echo '<thead class="table-primary">';
      echo '<tr><th>Tienda</th><th>Rubro/s</th><th>Contacto / URL</th><th>Reputación</th><th>Opciones</th></tr>';

      echo '</thead><tbody>';

      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['tienda']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rubro']) . '</td>';
        echo '<td><a class="text-decoration-none" target="_blank" href="' . htmlspecialchars($row['url']) . '">' . htmlspecialchars($row['url']) . '</a></td>';


        $reputacion = trim(strtolower($row['reputacion']));
        echo '<td>';
        if ($reputacion === 'desconocido') {
          echo '<span class="text-muted fst-italic">Desconocido</span>';
        } elseif (is_numeric($reputacion)) {
          for ($i = 0; $i < intval($reputacion); $i++) {
            echo '⭐';
          }
        } else {
          echo htmlspecialchars($row['reputacion']);
        }
        echo '</td>';
        echo '<td>
                <form method="POST" action="/sanfix/php/proveedor/eliminar-proveedor.php" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este proveedor?\')">
                  <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>';

        echo '</tr>';
      }

      echo '</tbody></table></div>';
    } else {
      echo '<div class="alert alert-warning text-center">⚠️ No se encontraron proveedores para ese rubro.</div>';
    }
    ?>

  </main>




  <?php require_once __DIR__ . './shared/footer.php'; ?>
</body>

<!-- Scripts compartidos -->
<?php require_once __DIR__ . './shared/scripts.php'; ?>

<!-- Scripts específicos -->
<script src="sanfix/scripts/custom-index.js"></script>
<script>
  function toggleNuevoRubro(valor) {
    const container = document.getElementById('nuevoRubroContainer');
    if (valor === 'otro') {
      container.classList.remove('d-none');
      document.getElementById('nuevoRubro').setAttribute('required', 'required');
    } else {
      container.classList.add('d-none');
      document.getElementById('nuevoRubro').removeAttribute('required');
    }
  }
</script>

</html>