<?php
session_start();
if (!isset($_SESSION['cedula'])) {
    header("Location: index.php");
    exit;
}

$cedula = $_SESSION['cedula'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Menú Principal</title>
</head>
<body>
<h2>Bienvenido, <?php echo $cedula == '1111' ? 'Administrador' : 'Usuario'; ?></h2>

<?php if ($cedula == '1111') { ?>
    <a href="usuarios.php"><button>Gestión de Usuarios</button></a>
<?php } ?>
<a href="articulos.php"><button>Gestión de Artículos</button></a>
<a href="logout.php"><button>Cerrar sesión</button></a>
</body>
</html>
