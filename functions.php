<?php
require_once 'config.php';

function conectar_db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
}

function checkEmail($email) {
    $conn = conectar_db();
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $conn->close();
    return mysqli_num_rows($result) > 0;
}

function obtener_id_usuario($correo) {
    $conn = conectar_db();
    $correo = mysqli_real_escape_string($conn, $correo);
    $sql = "SELECT id FROM usuarios WHERE email='$correo' LIMIT 1";
    $resultado = $conn->query($sql);
    if ($resultado && $resultado->num_rows == 1) {
        $registro = $resultado->fetch_assoc();
        $id_usuario = $registro['id'];
        $conn->close();
        return $id_usuario;
    } else {
        $conn->close();
        return false;
    }
}

?>