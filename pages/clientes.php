<!DOCTYPE html>
<html lang="es" data-bs-theme="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes</title>

  <?php require_once __DIR__ . '/shared/styles.php'; ?>
  <link rel="stylesheet" href="sanfix/style/custom-clientes.css">
</head>

<body class="bg-dark">
  <?php require_once __DIR__ . '/shared/header.php'; ?>

  <main class="container bg-light my-4 p-5 rounded-4 shadow-sm">
    <h1 class="bg-primary p-3 fw-bold">Clientes</h1>

    <!-- Botón para nuevo cliente -->
    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#nuevoClienteModal">
      Nuevo cliente
    </button>

    <!-- Modal para agregar cliente -->
    <div class="modal fade" id="nuevoClienteModal" tabindex="-1" aria-labelledby="nuevoClienteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="/sanfix/php/cliente/crear-cliente.php" method="POST" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="nuevoClienteLabel">Nuevo cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="mb-3">
              <label for="fechaAlta" class="form-label">Fecha de alta</label>
              <input type="datetime-local" class="form-control" name="fechaAlta" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar cliente</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>

    <?php
    require_once __DIR__ . '/../php/database-connection.php';

    $sql = "SELECT cliente.id, persona.nombre, persona.apellido, cliente.fechaAlta
            FROM cliente
            INNER JOIN persona ON cliente.idPersona = persona.id
            ORDER BY persona.nombre ASC";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo '<div class="table-responsive">';
      echo '<table class="table table-hover align-middle small">';
      echo '<thead class="table-primary">';
      echo '<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Fecha de alta</th><th>Opciones</th></tr>';
      echo '</thead><tbody>';

      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['fechaAlta']) . '</td>';
        echo '<td>
                <form method="POST" action="/sanfix/php/cliente/eliminar-cliente.php" onsubmit="return confirm(\'¿Eliminar este cliente?\')">
                  <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                  <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
              </td>';
        echo '</tr>';
      }

      echo '</tbody></table></div>';
    } else {
      echo '<div class="alert alert-warning text-center">⚠️ No se encontraron clientes.</div>';
    }
    ?>
  </main>

  <?php require_once __DIR__ . '/shared/footer.php'; ?>
</body>

<?php require_once __DIR__ . '/shared/scripts.php'; ?>
<script src="sanfix/scripts/custom-clientes.js"></script>
</html>
