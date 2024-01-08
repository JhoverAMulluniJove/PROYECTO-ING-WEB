<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $cantidad = $_POST["cantidad"];
            $categoria = $_POST["categoria"];
            $marca = $_POST["marca"];
            $proveedor = $_POST["proveedor"];

            $productoModelo = new ProductoModelo($conn);
    
            if($productoModelo->agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria, $marca, $proveedor)){

                $conn->close();

                header("Location: ../VISTA/admin/catalogadmin.php");
                exit();
            }
        }

?>