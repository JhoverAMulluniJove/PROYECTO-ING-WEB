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
        <?php
        // Verificar si hay un error en la URL
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            // Mostrar mensaje de error correspondiente al tipo de error
            if ($error === 'conexion') {
                echo '<p style="color: red;">Error de conexión a la base de datos</p>';
            } elseif ($error === 'credenciales') {
                // Verificar si se proporcionó un mensaje adicional
                $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
                
                if ($mensaje === 'usuario') {
                    echo '<p style="color: red;">Usuario y contraseña incorrecto</p>';
                } 
                elseif ($mensaje === 'contrasena') {
                    echo '<p style="color: red;">Contraseña incorrecta</p>';
                } 
                else {
                    echo '<p style="color: red;">Usuario o contraseña incorrectos</p>';
                }
            }
        }
        ?>
        <!-- Formulario de inicio de sesión -->
        <form id="loginForm" method="post" action="../CONTROLADOR/UserController.php">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <br>
            <label for="password_usuario">Contraseña:</label>
            <input type="password" id="password_usuario" name="password_usuario" required>
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
        
    </div>
</body>
</html>
