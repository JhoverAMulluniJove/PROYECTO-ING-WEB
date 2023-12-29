<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="container">
        <h2>FERRETERIA</h2>
        <?php include '../CONTROLADOR/errorlogin.php'?>
        <!-- Formulario de inicio de sesión -->
        <form id="loginForm" method="post" action="../CONTROLADOR/UserController.php">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <br>
            <label for="password_usuario">Contraseña:</label>
            <input type="password" id="password_usuario" name="password_usuario" required>
            <br>
            <input type="submit" value="Iniciar sesión">
            <br><br>
        </form>
        <button type="submit" onclick="redirigirARegistro()">Registrar</button>
    </div>
    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/regisrterbutton.js"></script>
</body>
</html>
