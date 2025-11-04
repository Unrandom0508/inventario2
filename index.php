<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $clave = $_POST['contrasena'];

    $stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE cedula=?");
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        if (hash('sha256', $clave) == $hash) {
            $_SESSION['cedula'] = $cedula;
            header("Location: menu.php");
            exit;
        }
    }
    $error = "Credenciales incorrectas";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login Inventario</title>
</head>
<body>
<h2>Ingreso al Sistema</h2>
<form method="POST">
  <label>Cédula:</label><br>
  <input type="text" name="cedula" required><br><br>

  <label>Contraseña:</label><br>
  <input type="password" name="contrasena" required><br><br>

  <input type="submit" value="Ingresar">
</form>
<p style="color:red;"><?php if(isset($error)) echo $error; ?></p>
</body>
</html>
