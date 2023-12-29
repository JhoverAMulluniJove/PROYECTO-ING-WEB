<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="../../PROYECTO-ING-WEB/CONTROLADOR/js/UserController.js" type="module"></script>
</head>
<body>
    <div class="container">
        <h2>FERRETERIA</h2>

        <!-- Formulario de registro de usuario -->
        <form id="registerForm" method="post" action="../CONTROLADOR/RegisterController.php">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <br>
            <label for="Nombre_cliente">Nombre:</label>
            <input type="text" id="Nombre_cliente" name="Nombre_cliente" required>
            <br>
            <label for="Apellido_cliente">Apellido:</label>
            <input type="text" id="Apellido_cliente" name="Apellido_cliente" required>
            <br>
            <label for="DNI">DNI:</label>
            <input type="text" id="DNI" name="DNI" pattern="\d+" title="Solo se permiten números" required>
            <br>
            <label for="Telefono_cliente">Telefono/Celular:</label>
            <input type="text" id="Telefono_cliente" name="Telefono_cliente" pattern="\d+" title="Solo se permiten números" required>
            <br>
            <label for="direccion_cliente">Dirección:</label>
            <input type="text" id="direccion_cliente" name="direccion_cliente" required>
            <br>
            <label for="email_cliente">Correo Electrónico:</label>
            <input type="text" id="email_cliente" name="email_cliente" required>
            <br>
            <label for="password_usuario">Contraseña:</label>
            <input type="password" id="password_usuario" name="password_usuario" required>
            <br>
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br>
            <input type="submit" value="Registrar">
            <br><br>
            <p style="color: white;">¿Ya tienes una cuenta? <a href="login.php" style="color: orange;">Inicia sesión aquí</a></p>
        </form>
    </div>
</body>
</html>
