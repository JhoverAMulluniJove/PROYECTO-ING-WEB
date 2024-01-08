<?php
include 'conexion.php';

class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function obtenerUsuarios() {
        $sql = "SELECT u.id_usuario, u.nombre_usuario, u.password_usuario, c.DNI, c.Nombre_cliente, c.Apellido_cliente, c.Telefono_cliente, c.email_cliente, c.direccion_cliente
                FROM ferreteria.usuario u
                INNER JOIN ferreteria.cliente c ON u.cliente_DNI = c.DNI 
                ORDER BY u.id_usuario";

        $result = $this->conn->query($sql);

        $usuarios = array();

        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        } else {
            throw new Exception("Error en la consulta SQL para obtener usuarios: " . $this->conn->error);
        }

        return $usuarios;
    }
    
    public function iniciarSesion($nombreUsuario, $password)
    {
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = ? AND password_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombreUsuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows === 1;
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
            $sql = "CALL InsertarClienteYUsuario(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->conn->error);
            }

            $stmt->bind_param("ississss", $clienteDNI, $Nombre_cliente, $Apellido_cliente, $Telefono_cliente, $email_cliente, $direccion_cliente, $nombreUsuario, $passwordusuario);

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
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    public function eliminarUsuario($idUsuario)
    {
        $sql = "DELETE usuario, cliente FROM usuario
        JOIN cliente ON usuario.cliente_DNI = cliente.DNI
        WHERE usuario.id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idUsuario);

        return $stmt->execute();
    }

    public function actualizarUsuario($id_usuario, $nombre_usuario, $password_usuario, $DNI_cliente, $nombre_cliente, $apellido_cliente, $telefono_cliente, $email_cliente, $direccion_cliente)
    {
        // Utiliza $this->conn en lugar de $conn
        $stmt = $this->conn->prepare("CALL ModificarUsuarioYCliente(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $id_usuario, $nombre_usuario, $password_usuario, $DNI_cliente, $nombre_cliente, $apellido_cliente, $telefono_cliente, $email_cliente, $direccion_cliente);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Procedimiento almacenado ejecutado correctamente";
        } else {
            echo "Error al ejecutar el procedimiento almacenado: " . $stmt->error;
        }

        return $stmt->close();
    }
}
?>
