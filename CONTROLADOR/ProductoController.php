<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';

class ProductoController {
    private $conn; // Propiedad para almacenar la conexión

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public static $categorias = array(
        1 => "CATEGORIA 01",
        2 => "CATEGORIA 02",
        3 => "CATEGORIA 03",
        4 => "CATEGORIA 04",
        5 => "CATEGORIA 05",
        6 => "CATEGORIA 06",
        7 => "CATEGORIA 07"
    );

    public function mostrarCatalogo() {
        $productoModelo = new ProductoModelo($this->conn);
        $data = $productoModelo->obtenerProductos();

        $dataaux = $this->obtenerNombresProductos();

        include '../VISTA/catalog.php';
    }

    private function obtenerNombresProductos() {
        $sqlaux = "SELECT nombre_producto FROM producto";
        $resultaux = $this->conn->query($sqlaux);

        $dataaux = array(); // Array para almacenar los nombres de productos

        if ($resultaux !== false) {
            while ($rowaux = $resultaux->fetch_assoc()) {
                $dataaux[] = $rowaux['nombre_producto'];
            }
        } else {
            echo "Error en la consulta SQL para obtener nombres de productos: " . $this->conn->error;
        }

        return $dataaux;
    }
}

// Crear una instancia del controlador y pasar la conexión
$productoController = new ProductoController($conn);

// Llamar a la función para mostrar el catálogo
$productoController->mostrarCatalogo();

?>