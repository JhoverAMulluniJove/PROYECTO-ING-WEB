<?php
// ProductoModelo.php
include 'conexion.php';

class ProductoModelo {
    public function obtenerProductos() {
        global $conn;
        $sql = "SELECT nombre_producto, descripcion_producto, precio_producto, cantidad_producto, categoria_id_categoria, ruta_imagen FROM producto";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>