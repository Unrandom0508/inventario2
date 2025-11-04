<?php
$conexion = new mysqli("localhost:mysql-flaw.alwaysdata.net", "flaw", "misifu123+", "flaw_inventario2");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
