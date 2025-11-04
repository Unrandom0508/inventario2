<?php
$conexion = new mysqli("localhost:https://github.com/Unrandom0508/inventario2.git", "flaw", "misifu123+", "flaw_inventario2");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
