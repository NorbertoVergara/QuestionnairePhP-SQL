<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    try {
        $mysqli = conectar_db();

        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE cedula = ?");
        $stmt->bind_param('s', $cedula);
        $stmt->execute();

        if($stmt->fetch()) {
            echo "<p>El usuario ya existe en la base de datos.</p>";
        } else {
            $stmt = $mysqli->prepare("INSERT INTO usuarios (cedula, nombre, apellido, email, password, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param('ssssss', $cedula, $nombre, $apellido, $email, $hashed_password, $fecha_nacimiento);
            $stmt->execute();

            echo "<p>El usuario fue registrado correctamente.</p>";
            header("Location: index.php");
            exit();
        }

        $mysqli->close();
    } catch(Exception $e) {
        echo "<p>Hubo un error al registrar el usuario: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registro de usuarios</title>
</head>
<body>
  <h1>Registro de usuarios</h1>

  <form method="POST" action="registro.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required>
    <br>
    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" required>
    <br>
    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Registrar usuario">
  </form>
</body>
</html>
