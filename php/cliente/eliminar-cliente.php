<?php
require_once __DIR__ . '/../database-connection.php';

$id = $_POST['id'] ?? null;

if ($id) {
  $stmt = $conn->prepare("DELETE FROM cliente WHERE id = ?");
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    header("Location: ../../index.php?exito=1");
    exit;
  }
}
?>