<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombreUsuario = $_POST["nombre_usuario"];
        $passwordusuario = $_POST["password_usuario"];

        // Incluir el modelo de usuario
        require_once '../MODELO/UserModel.php';

        // Configurar la conexión a la base de datos
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "ferreteria";

        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        // Verificar la conexión
        if ($conexion->connect_error) {
            // Si la conexión falla, redirigir a login.php con un mensaje de error
            header("Location: ../VISTA/login.php?error=conexion");
            exit();
        }

        // Crear una instancia del modelo de usuario
        $userModel = new UserModel($conexion);

        // Intentar iniciar sesión
        if ($userModel->iniciarSesion($nombreUsuario, $passwordusuario)) {
            // Inicio de sesión exitoso, redirigir a indexlogin.php
            if($nombreUsuario = "admin"){
                header("Location: ../VISTA/admin/indexloginadmin.php");
            }
            else{
                header("Location: ../VISTA/indexlogin.php");
            }
            exit();
        } else {
            // Inicio de sesión fallido, redirigir a login.php con un mensaje de error
            // Agregar un mensaje adicional para indicar el tipo de error
            if ($userModel->existeUsuario($nombreUsuario)) {
                // Si el usuario existe, pero la contraseña es incorrecta
                header("Location: ../VISTA/login.php?error=credenciales&mensaje=contrasena");
                exit();
            } else {
                // Si el usuario no existe
                header("Location: ../VISTA/login.php?error=credenciales&mensaje=usuario");
                exit();
            }
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    }
?>
