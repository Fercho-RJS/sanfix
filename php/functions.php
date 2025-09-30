<?php
function allProveedores($conn) {
    $sql = "SELECT * FROM proveedores;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $proveedores = [];
        while ($row = $result->fetch_assoc()) {
            $proveedores[] = $row;
        }
        return $proveedores;
    } else {
        return [];
    }
}
?>