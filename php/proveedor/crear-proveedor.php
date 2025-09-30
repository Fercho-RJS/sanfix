<?php
require_once __DIR__ . '/../database-connection.php';

$tienda = $_POST['tienda'] ?? '';
$rubro = $_POST['rubroSelect'] === 'otro' ? ($_POST['nuevoRubro'] ?? '') : $_POST['rubroSelect'];
$url = $_POST['url'] ?? '';
$reputacion = $_POST['reputacion'] ?? '';

$stmt = $conn->prepare("INSERT INTO proveedor (tienda, rubro, url, reputacion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $tienda, $rubro, $url, $reputacion);

if ($stmt->execute()) {
  header("Location: ../../index.php?exito=1");
} else {
  header("Location: ../../index.php?error=1");
}
?>
