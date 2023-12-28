<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "artescocielo10";
$db_name = "ferreteria";
$tbl1_name = "usuario";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class UserModel
{
    private $conn;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Función para iniciar sesión
    public function iniciarSesion($nombreUsuario, $password)
    {
        // Realizar la lógica de autenticación aquí
        // Consulta de ejemplo
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = ? AND password_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombreUsuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return true;
        } else {
            // Autenticación fallida
            return false;
        }
    }

    public function existeUsuario($nombreUsuario)
    {
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    // Función para registrar un nuevo usuario
    public function registrarUsuario($nombreUsuario, $password, $clienteDNI)
    {
        // Realizar la lógica de registro aquí
        // Consulta de ejemplo
        $sql = "INSERT INTO usuario (nombre_usuario, password_usuario, cliente_DNI) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nombreUsuario, $password, $clienteDNI);

        if ($stmt->execute()) {
            // Registro exitoso
            return true;
        } else {
            // Error en el registro
            return false;
        }
    }

    // Función para eliminar un usuario
    public function eliminarUsuario($idUsuario)
    {
        // Realizar la lógica de eliminación aquí
        // Consulta de ejemplo
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idUsuario);

        if ($stmt->execute()) {
            // Eliminación exitosa
            return true;
        } else {
            // Error en la eliminación
            return false;
        }
    }

    // Función para actualizar información de un usuario
    public function actualizarUsuario($idUsuario, $nuevoNombre, $nuevaPassword, $nuevoClienteDNI)
    {
        // Realizar la lógica de actualización aquí
        // Consulta de ejemplo
        $sql = "UPDATE usuario SET nombre_usuario = ?, password_usuario = ?, cliente_DNI = ? WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $nuevoNombre, $nuevaPassword, $nuevoClienteDNI, $idUsuario);

        if ($stmt->execute()) {
            // Actualización exitosa
            return true;
        } else {
            // Error en la actualización
            return false;
        }
    }
}
?>
