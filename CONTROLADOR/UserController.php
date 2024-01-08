<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombreUsuario = $_POST["nombre_usuario"];
        $passwordusuario = $_POST["password_usuario"];

        require_once '../MODELO/UserModel.php';

        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "ferreteria";

        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($conexion->connect_error) {
            header("Location: ../VISTA/login.php?error=conexion");
            exit();
        }

        $userModel = new UserModel($conexion);

        if ($userModel->iniciarSesion($nombreUsuario, $passwordusuario)) {
            if($nombreUsuario = "admin"){
                header("Location: ../VISTA/admin/indexloginadmin.php");
            }
            else{
                header("Location: ../VISTA/indexlogin.php");
            }
            exit();
        } else {
            if ($userModel->existeUsuario($nombreUsuario)) {
                header("Location: ../VISTA/login.php?error=credenciales&mensaje=contrasena");
                exit();
            } else {
                header("Location: ../VISTA/login.php?error=credenciales&mensaje=usuario");
                exit();
            }
        }
        $conexion->close();
    }
?>
