<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar y sanitizar los datos de entrada
        $clienteDNI = filter_input(INPUT_POST, "DNI", FILTER_SANITIZE_STRING);
        $Nombre_cliente = filter_input(INPUT_POST, "Nombre_cliente", FILTER_SANITIZE_STRING);
        $Apellido_cliente = filter_input(INPUT_POST, "Apellido_cliente", FILTER_SANITIZE_STRING);
        $Telefono_cliente = filter_input(INPUT_POST, "Telefono_cliente", FILTER_SANITIZE_STRING);
        $email_cliente = filter_input(INPUT_POST, "email_cliente", FILTER_SANITIZE_EMAIL);
        $direccion_cliente = filter_input(INPUT_POST, "direccion_cliente", FILTER_SANITIZE_STRING);
        $nombreUsuario = filter_input(INPUT_POST, "nombre_usuario", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password_usuario", FILTER_SANITIZE_STRING);
        $id_usuario = null;

        require_once '../MODELO/UserModel.php';

        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "artescocielo10";
        $db_name = "ferreteria";

        try {
            
            $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

            if ($conexion->connect_error) {
                die("La conexión falló: " . $conexion->connect_error);
            }

            $conexion->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0');
        $conexion->begin_transaction();

        // Generar un id_usuario aleatorio
        $id_usuario = rand(1, 9999);

        // Verificar si el id_usuario ya existe en la base de datos
        $consultaExistencia = $conexion->prepare("SELECT COUNT(*) as count FROM usuario WHERE id_usuario = ?");
        $consultaExistencia->bind_param('i', $id_usuario);
        $consultaExistencia->execute();
        $resultadoExistencia = $consultaExistencia->get_result();
        $conteoExistencia = $resultadoExistencia->fetch_assoc()['count'];
        $consultaExistencia->close();

        // Si el id_usuario ya existe, genera uno nuevo hasta que encuentres uno único
        while ($conteoExistencia > 0) {
            $id_usuario = rand(1, 9999);
            $consultaExistencia->bind_param('i', $id_usuario);
            $consultaExistencia->execute();
            $resultadoExistencia = $consultaExistencia->get_result();
            $conteoExistencia = $resultadoExistencia->fetch_assoc()['count'];
            $consultaExistencia->close();
        }

        // Ahora $id_usuario es único y puedes proceder con la inserción
        $stmt = $conexion->prepare("INSERT INTO usuario (nombre_usuario, password_usuario, id_usuario) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $nombreUsuario, $password, $id_usuario);
        $stmt->execute();
        $stmt->close();

        // Crear una instancia del modelo de usuario pasando la conexión como parámetro
        $userModel = new UserModel($conexion);

        // Llamar al método registrarUsuario
        if ($userModel->registrarUsuario($clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $id_usuario)) {
            header("Location: ../VISTA/indexlogin.php");
            exit();
        } else {
            throw new Exception("Error al registrar usuario");
        }

        // Confirmar la transacción
        $conexion->commit();
    } catch (Exception $e) {
        // Deshacer la transacción en caso de error
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        if (isset($conexion)) {
            $conexion->close();
        }
    }
}
?>