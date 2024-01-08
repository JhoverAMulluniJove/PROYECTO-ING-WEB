<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\UserModel.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\UsuarioController.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombreusuario = $_POST["nombre_usuario"];
        $contraseña = $_POST["password_usuario"];
        $nombre = $_POST["Nombre_cliente"];
        $apellido = $_POST["Apellido_cliente"];
        $DNI = $_POST["DNI"];
        $Telefono_cliente = $_POST["Telefono_cliente"];
        $direccion_cliente = $_POST["direccion_cliente"];
        $email_cliente = $_POST["email_cliente"];

        $userModelo = new UserModel($conn);
    
            if($userModelo->registrarUsuario($DNI, $nombre, $apellido, $Telefono_cliente, $email_cliente, $direccion_cliente, $nombreusuario, $contraseña)){

                $conn->close();

                header("Location: ../VISTA/admin/usuariosadmin.php");
                exit();
            }
    }

?>