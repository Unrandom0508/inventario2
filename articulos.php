<?php
session_start();
if (!isset($_SESSION['cedula'])) { header("Location: index.php"); exit; }
include("db.php");
$result = $conexion->query("SELECT * FROM articulos");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Gestión de Artículos</title></head>
<body>
<h2>Gestión de Artículos</h2>
<a href="agregar_articulo.php">➕ Agregar artículo</a> | 
<a href="menu.php">🔙 Volver</a>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nombre</th><th>Unidades</th><th>Tipo</th><th>Bodega</th><th>Acciones</th></tr>
<?php while($fila = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $fila['id'] ?></td>
  <td><?= $fila['nombre'] ?></td>
  <td><?= $fila['unidades'] ?></td>
  <td><?= $fila['tipo'] ?></td>
  <td><?= $fila['bodega'] ?></td>
  <td>
    <a href="editar_articulo.php?id=<?= $fila['id'] ?>">Editar</a> | 
    <a href="eliminar_articulo.php?id=<?= $fila['id'] ?>">Eliminar</a>
  </td>
</tr>
<?php } ?>
</table>
</body>
</html>
