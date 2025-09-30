<?php
$host = "localhost";      // o la IP del servidor
$usuario = "root";
$contrasena = "";
$base_datos = "sanfix";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
