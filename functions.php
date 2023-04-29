<?php
require_once 'config.php';

function conectar_db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
}

// Función para verificar si un correo electrónico ya está registrado en la base de datos
function checkEmail($email) {
    $conn = conectar_db();
  
    // Escapamos los caracteres especiales en el correo electrónico
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) > 0) {
      // El correo electrónico ya está registrado
      $conn->close();
      return true;
    } else {
      // El correo electrónico no está registrado
      $conn->close();
      return false;
    }
  }

function obtener_id_usuario($correo) {
    // Conectarse a la base de datos
    $conn = conectar_db();

    // Escapar el correo electrónico para evitar inyección de SQL
    $correo = mysqli_real_escape_string($conn, $correo);

    // Construir la consulta SQL para buscar el usuario
    $sql = "SELECT id FROM usuarios WHERE email='$correo' LIMIT 1";

    // Ejecutar la consulta SQL y obtener el resultado
    $resultado = $conn->query($sql);

    // Verificar si se encontró el usuario
    if ($resultado && $resultado->num_rows == 1) {
        // Obtener el registro del usuario
        $registro = $resultado->fetch_assoc();

        // Obtener el valor del campo 'id'
        $id_usuario = $registro['id'];

        // Cerrar la conexión a la base de datos
        $conn->close();

        // Devolver el valor del campo 'id'
        return $id_usuario;
    } else {
        // Cerrar la conexión a la base de datos
        $conn->close();

        // Devolver 'false' si el usuario no se encontró
        return false;
    }
}

?>