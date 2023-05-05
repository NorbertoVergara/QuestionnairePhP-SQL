<?php
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    try {
        $conn = conectar_db();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=? LIMIT 1");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["usuario"] = $row["nombre"];
                $_SESSION["correo"] = $email;
                header("Location: cuestionario.php");
                exit();
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "El usuario no existe";
        }
        $conn->close();
    } catch (Exception $e) {
        echo "Error al buscar el usuario: " . $e->getMessage();
    }
} else {
    session_start();
    if (isset($_SESSION["usuario"])) {
        header("Location: cuestionario.php");
        exit();
    }
}
?>