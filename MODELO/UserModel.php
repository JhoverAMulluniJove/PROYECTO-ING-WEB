<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "artescocielo10";
$db_name = "ferreteria";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class UserModel
{
    private $conn;

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
    public function registrarUsuario($clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $id_usuario)
    {
        if ($this->conn === null) {
            throw new Exception("La conexión a la base de datos no está disponible.");
        }

        try {
            // Modifica la llamada al procedimiento almacenado
            $stmt = $this->conn->prepare("CALL InsertarCliente(?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issisii", $clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $id_usuario);

            // Ejecutar el procedimiento almacenado
            $success = $stmt->execute();
            $stmt->close();

            if ($success) {
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento almacenado: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
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
