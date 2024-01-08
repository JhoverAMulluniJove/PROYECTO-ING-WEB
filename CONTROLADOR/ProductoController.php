<?php
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

    public function agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibir datos del formulario
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $cantidad = $_POST["cantidad"];
            $categoria = $_POST["categoria"];
            $marca = $_POST["marca"];
            $proveedor = $_POST["proveedor"];
            $productoController = new ProductoController($conn);
    
            // Agregar el producto
            $productoController->agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor);

            // Cerrar conexión
            $conn->close();

            // Redireccionar a catalog.php después de agregar el producto
            header("Location: ../VISTA/admin/catalog.php");
            exit();
        }
    }

    public function modificarProducto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor) {
        $this->productoModelo->modificarProducto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor);
    }

    public function eliminarProducto($id) {
                
            if($this->productoModelo->eliminarProducto($id)){
                echo 'Producto eliminado con éxito';
            }
    }

    public function restaurarProducto($id) {
        $this->productoModelo->restaurarProducto($id);
    }
    public function obtenerNombresProductos() {
        $sqlaux = "SELECT nombre_producto FROM producto";
        $resultaux = $this->conn->query($sqlaux);

        $dataaux = array(); // Array para almacenar los nombres de productos

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
