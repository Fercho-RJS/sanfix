<?php
require_once __DIR__ . '/../database-connection.php';

// Capturar datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$fechaAlta = $_POST['fechaAlta'] ?? '';

// Validar campos básicos
if ($nombre && $apellido && $fechaAlta) {
  // Insertar en persona
  $stmtPersona = $conn->prepare("INSERT INTO persona (nombre, apellido) VALUES (?, ?)");
  $stmtPersona->bind_param("ss", $nombre, $apellido);
  if ($stmtPersona->execute()) {
    $idPersona = $stmtPersona->insert_id;

    // Insertar en cliente
    $stmtCliente = $conn->prepare("INSERT INTO cliente (idPersona, fechaAlta) VALUES (?, ?)");
    $stmtCliente->bind_param("is", $idPersona, $fechaAlta);
    if ($stmtCliente->execute()) {
      header("Location: ../../index.php?exito=1");
      exit;
    }
  }
}

// Si algo falla
header("Location: ../../index.php?error=1");
exit;
?>
