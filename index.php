<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="Registro">
    <form action="login.php" method="post" class="login-form">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit" class="login-btn">Iniciar sesión</button>
    </form>
    <button type="button" onclick="location.href='registro.php'" class="register-btn">Registrarse</button>
    </div>
</body>
</html>
