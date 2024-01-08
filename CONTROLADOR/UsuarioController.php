<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\UserModelo.php';

class UsuarioController {
    
    private $conn;
    private $userModelo;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->userModelo = new UserModel($conn);
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
        // Llamada a la función del modelo para modificar el producto
        $this->productoModelo->modificarProducto($id, $nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor);
        // Redirigir después de modificar el producto
        header("Location: ../VISTA/admin/catalog.php");
        exit();
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
