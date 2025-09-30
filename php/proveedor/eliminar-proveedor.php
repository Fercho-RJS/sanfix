<?php
require_once __DIR__ . '/../database-connection.php';

$id = $_POST['id'] ?? null;

if ($id) {
  $stmt = $conn->prepare("DELETE FROM proveedor WHERE id = ?");
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    header("Location: ../../index.php?eliminado=1");
  } else {
    header("Location: ../../index.php?error=1");
  }
} else {
  header("Location: ../../index.php?error=1");
}
?>
