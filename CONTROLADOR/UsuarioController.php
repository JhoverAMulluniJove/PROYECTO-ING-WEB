<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\UserModel.php';

class UsuarioController {
    
    private $conn;
    private $userModelo;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->userModelo = new UserModel($conn);
    }

    public function obtenerUsuarios() {
        return $this->userModelo->obtenerUsuarios();
    }

    public function obtenerNombresUsuarios() {
        $sqlaux = "SELECT nombre_usuario FROM usuario";
        $resultaux = $this->conn->query($sqlaux);

        $dataaux = array();
        if ($resultaux !== false) {
            while ($rowaux = $resultaux->fetch_assoc()) {
                $dataaux[] = $rowaux['nombre_usuario'];
            }
        } else {
            throw new Exception("Error en la consulta SQL para obtener nombres de productos: " . $this->conn->error);
        }

        return $dataaux;
    }

}
?>
