<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_producto'])) {
    $idProducto = $_POST['id_producto'];

    try {
        // Crear una instancia de ProductoModelo con tu conexión
        $productoModelo = new ProductoModelo($conn);

        // Intentar eliminar el producto
        if ($productoModelo->eliminarProducto($idProducto)) {
            echo 'success';
        } else {
            echo 'error al intentar eliminar el producto';
        }
    } catch (Exception $e) {
        echo 'error al intentar eliminar el producto: ' . $e->getMessage();
    }
} else {
    echo 'error: solicitud incorrecta';
}
?>
