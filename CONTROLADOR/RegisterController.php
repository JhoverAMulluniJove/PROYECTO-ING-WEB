<?php
session_start();

// Validar si es una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar los datos de entrada
    $clienteDNI = filter_input(INPUT_POST, "DNI", FILTER_SANITIZE_STRING);
    $Nombre_cliente = filter_input(INPUT_POST, "Nombre_cliente", FILTER_SANITIZE_STRING);
    $Apellido_cliente = filter_input(INPUT_POST, "Apellido_cliente", FILTER_SANITIZE_STRING);
    $Telefono_cliente = filter_input(INPUT_POST, "Telefono_cliente", FILTER_SANITIZE_STRING);
    $email_cliente = filter_input(INPUT_POST, "email_cliente", FILTER_SANITIZE_EMAIL);
    $direccion_cliente = filter_input(INPUT_POST, "direccion_cliente", FILTER_SANITIZE_STRING);
    $nombreUsuario = filter_input(INPUT_POST, "nombre_usuario", FILTER_SANITIZE_STRING);
    $passwordusuario = filter_input(INPUT_POST, "password_usuario", FILTER_SANITIZE_STRING);

    // Incluir el modelo y las credenciales de la base de datos
    require_once '../MODELO/UserModel.php';

    try {
        // Crear una instancia de UserModel
        $userModel = new UserModel($conn);

        if ($userModel->registrarUsuario($clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $nombreUsuario, $passwordusuario)) {
            header("Location: ../VISTA/indexlogin.php");
            exit();
        } else {
            throw new Exception("Error al registrar usuario");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error SQL: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>