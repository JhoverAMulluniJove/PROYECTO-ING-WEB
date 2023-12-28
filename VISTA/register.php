<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="CSS/index.css">
    <!-- En lugar de incluir los scripts directamente aquí, crearemos un script separado para manejar las acciones de usuario -->
    <script src="../../PROYECTO-ING-WEB/CONTROLADOR/js/UserController.js" type="module"></script>
</head>
<body>
    <div class="container">
        <h3>FERRETERIA - Registro de Usuario</h3>

        <!-- Formulario de registro -->
        <form onsubmit="return registerUser(
            document.getElementById('new_nombre_usuario').value,
            document.getElementById('new_password_usuario').value
        );" method="post">
            <label for="new_nombre_usuario">Nuevo Nombre de Usuario:</label>
            <input type="text" id="new_nombre_usuario" name="new_nombre_usuario" required>
            <br>
            <label for="new_password_usuario">Nueva Contraseña:</label>
            <input type="password" id="new_password_usuario" name="new_password_usuario" required>
            <br>
            <input type="submit" value="Registrar">
        </form>

        <!-- Enlace para volver al inicio de sesión -->
        <p>¿Ya tienes una cuenta? <a href="login.html">Inicia sesión aquí</a>.</p>
    </div>
</body>
</html>
