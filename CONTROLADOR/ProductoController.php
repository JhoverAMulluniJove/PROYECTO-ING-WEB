<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';

class ProductoController {
    
    private $conn;
    private $productoModelo;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->productoModelo = new ProductoModelo($conn);
    }

    public function obtenerCategorias() {
        return $this->productoModelo->obtenerCategorias();
    }
    public function obtenerMarcas() {
        return $this->productoModelo->obtenerMarcas();
    }
    public function obtenerProveedores() {
        return $this->productoModelo->obtenerProveedores();
    }

    public function obtenerProductos() {
        return $this->productoModelo->obtenerProductos();
    }

    public function obtenerNombresProductos() {
        $sqlaux = "SELECT nombre_producto FROM producto";
        $resultaux = $this->conn->query($sqlaux);

        $dataaux = array(); 

        if ($resultaux !== false) {
            while ($rowaux = $resultaux->fetch_assoc()) {
                $dataaux[] = $rowaux['nombre_producto'];
            }
        } else {
            throw new Exception("Error en la consulta SQL para obtener nombres de productos: " . $this->conn->error);
        }

        return $dataaux;
    }

}
?>
