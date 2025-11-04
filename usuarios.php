<?php
session_start();
if ($_SESSION['cedula'] != '1111') { header("Location: articulos.php"); exit; }
include("db.php");
$result = $conexion->query("SELECT cedula, nombre FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Gestión de Usuarios</title></head>
<body>
<h2>Gestión de Usuarios</h2>
<a href="agregar_usuario.php">➕ Agregar usuario</a> | 
<a href="menu.php">🔙 Volver</a>
<table border="1" cellpadding="5">
<tr><th>Cédula</th><th>Nombre</th><th>Acciones</th></tr>
<?php while($fila = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $fila['cedula'] ?></td>
  <td><?= $fila['nombre'] ?></td>
  <td><a href="editar_usuario.php?cedula=<?= $fila['cedula'] ?>">Editar</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
