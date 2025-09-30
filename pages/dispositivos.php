<!DOCTYPE html>
<html lang="es" data-bs-theme="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>

  <!-- Estilos compartidos -->
  <?php require_once __DIR__ . '/shared/styles.php'; ?>

  <!-- Estilos específicos -->
  <link rel="stylesheet" href="sanfix/style/custom-index.css">
</head>

<body class="bg-dark">
  <?php require_once __DIR__ . '/shared/header.php'; ?>

  <main class="container bg-light my-4 p-5 rounded-4 shadow-sm">
    <h1 class="bg-primary p-3 fw-bold">Dispositivos</h1>

    <?php
    require_once __DIR__ . '/../php/database-connection.php';

    // Obtener estados únicos
    $estado_result = $conn->query("SELECT DISTINCT estado FROM dispositivo ORDER BY estado ASC");
    $estados = [];
    if ($estado_result && $estado_result->num_rows > 0) {
      while ($e = $estado_result->fetch_assoc()) {
        $estados[] = $e['estado'];
      }
    }

    // Capturar filtro seleccionado
    $filtro = isset($_GET['estado']) ? $_GET['estado'] : '';
    ?>

    <!-- Filtro por estado -->
    <form method="GET" class="mb-4">
      <label for="estado" class="form-label fw-bold">Filtrar por estado:</label>
      <div class="input-group">
        <select name="estado" id="estado" class="form-select">
          <option value="">-- Todos --</option>
          <?php foreach ($estados as $e): ?>
            <option value="<?= htmlspecialchars($e) ?>" <?= $filtro === $e ? 'selected' : '' ?>>
              <?= htmlspecialchars($e) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
      </div>
    </form>

    <!-- Botón para nuevo dispositivo -->
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#nuevoDispositivoModal">
      Nuevo
    </button>

    <!-- Modal para agregar dispositivo -->
    <div class="modal fade" id="nuevoDispositivoModal" tabindex="-1" aria-labelledby="nuevoDispositivoLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="/sanfix/php/dispositivo/crear-dispositivo.php" method="POST" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="nuevoDispositivoLabel">Nuevo dispositivo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <?php
            $clientes_result = $conn->query("
                SELECT cliente.id, persona.nombre, persona.apellido
                FROM cliente
                INNER JOIN persona ON cliente.idPersona = persona.id
                ORDER BY persona.nombre ASC
              ");
            ?>
            <div class="mb-3">
              <label for="idCliente" class="form-label">Cliente</label>
              <select name="idCliente" class="form-select" required>
                <option value="">-- Seleccionar cliente --</option>
                <?php while ($c = $clientes_result->fetch_assoc()): ?>
                  <option value="<?= $c['id'] ?>">
                    <?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']) ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="marca" class="form-label">Marca</label>
              <input type="text" class="form-control" name="marca" required>
            </div>
            <div class="mb-3">
              <label for="modelo" class="form-label">Modelo</label>
              <input type="text" class="form-control" name="modelo" required>
            </div>
            <div class="mb-3">
              <label for="imei" class="form-label">IMEI</label>
              <input type="text" class="form-control" name="imei" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="text" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label for="pin" class="form-label">PIN</label>
              <input type="text" class="form-control" name="pin">
            </div>
            <div class="mb-3">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" class="form-control" name="estado" required>
            </div>
            <div class="mb-3">
              <label for="procesador" class="form-label">Procesador</label>
              <input type="text" class="form-control" name="procesador">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar dispositivo</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabla de dispositivos -->
    <?php
    $sql = "SELECT d.*, p.nombre, p.apellido
        FROM dispositivo d
        LEFT JOIN cliente c ON d.idCliente = c.id
        LEFT JOIN persona p ON c.idPersona = p.id";


    if ($filtro) {
      $sql .= " WHERE d.estado = ?";
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
      echo '<tr><th>ID</th><th>Cliente</th><th>Marca</th><th>Modelo</th><th>IMEI</th><th>Estado</th><th>Procesador</th><th>Opciones</th></tr>';

      echo '</thead><tbody>';

      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        $nombreCompleto = htmlspecialchars($row['nombre'] . ' ' . $row['apellido']);
        echo '<td>' . $nombreCompleto . '</td>';

        echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
        echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
        echo '<td>' . htmlspecialchars($row['imei']) . '</td>';
        echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
        echo '<td>' . htmlspecialchars($row['procesador']) . '</td>';
        echo '<td>
              <form method="POST" action="/sanfix/php/dispositivo/eliminar-dispositivo.php" onsubmit="return confirm(\'¿Eliminar este dispositivo?\')">
                <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>';
        echo '</tr>';
      }

      echo '</tbody></table></div>';
    } else {
      echo '<div class="alert alert-warning text-center">⚠️ No se encontraron dispositivos.</div>';
    }
    ?>
  </main>


  <?php require_once __DIR__ . '/shared/footer.php'; ?>
</body>

<!-- Scripts compartidos -->
<?php require_once __DIR__ . '/shared/scripts.php'; ?>

<!-- Scripts específicos -->
<script src="sanfix/scripts/custom-index.js"></script>

</html>