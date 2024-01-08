<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ferreteria";

// Crear una nueva instancia de la clase mysqli para establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
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

    public function registrarUsuario($clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $nombreUsuario, $passwordusuario)
    {
        if ($this->conn === null) {
            throw new Exception("La conexión a la base de datos no está disponible.");
        }

        try {
            // Modificar la llamada al procedimiento almacenado
            $sql = "CALL InsertarClienteYUsuario(?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Asegurarse de que la conexión esté disponible y sea válida
            if (!($stmt = $this->conn->prepare($sql))) {
                throw new Exception("Error al preparar la consulta: " . $this->conn->error);
            }

            // Modificar los tipos de datos en bind_param según los tipos esperados en tu procedimiento almacenado
            $stmt->bind_param("ississss", $clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $nombreUsuario, $passwordusuario);

            // Ejecutar el procedimiento almacenado
            $success = $stmt->execute();

            if ($success) {
                return true;
            } else {
                throw new Exception("Error al ejecutar el procedimiento almacenado: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            // Cerrar la declaración preparada si está definida
            if (isset($stmt)) {
                $stmt->close();
            }
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
