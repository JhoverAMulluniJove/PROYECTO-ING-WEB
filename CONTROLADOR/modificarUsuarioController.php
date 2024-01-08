<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\UserModel.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\UsuarioController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $idusuario = $_POST["id_usuario"];
            $nombreusuario = $_POST["nombre_usuario"];
            $contraseña = $_POST["password_usuario"];
            $nombre = $_POST["Nombre_cliente"];
            $apellido = $_POST["Apellido_cliente"];
            $DNI = $_POST["DNI"];
            $Telefono_cliente = $_POST["Telefono_cliente"];
            $direccion_cliente = $_POST["direccion_cliente"];
            $email_cliente = $_POST["email_cliente"];

            $userModel = new UserModel($conn);

            if($userModel->actualizarUsuario($idusuario, $nombreusuario, $contraseña, $DNI, $nombre, $apellido,  $Telefono_cliente, $email_cliente, $direccion_cliente)){

                $conn->close();

                header("Location: ../VISTA/admin/usuariosadmin.php");
                exit();
            }
        }

?>