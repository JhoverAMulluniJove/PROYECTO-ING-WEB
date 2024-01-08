<?php
// Incluye el archivo de configuración de la base de datos
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Nuevo Producto</h2>

    <form action="../../CONTROLADOR/AgregarController.php" method="post">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="descripcion">Descripción del Producto:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" required><br>

        <label for="categoria">Categoría:</label>
        <!-- Aquí puedes cargar las categorías desde tu controlador -->
        <select id="categoria" name="categoria">
            <?php
                $productoController = new ProductoController($conn);
                // Obtener las categorías desde el controlador o modelo
                $categorias = $productoController->obtenerCategorias();

                // Iterar sobre las categorías y generar las opciones del select
                foreach ($categorias as $idCategoria => $nombreCategoria) {
                    echo "<option value=\"$nombreCategoria\">$nombreCategoria</option>";
                }

            ?>
        </select><br>

        <label for="marca">Marca:</label>
        <select id="marca" name="marca">
            <?php
                $productoController = new ProductoController($conn);
                // Obtener las marcas desde el controlador o modelo
                $marcas = $productoController->obtenerMarcas();

                // Iterar sobre las marcas y generar las opciones del select
                foreach ($marcas as $idMarca => $nombreMarca) {
                    echo "<option value=\"$nombreMarca\">$nombreMarca</option>";
                }
            ?>
        </select><br>

        <label for="proveedor">Proveedor:</label>
        <select id="proveedor" name="proveedor">
            <?php
                $productoController = new ProductoController($conn);
                // Obtener los proveedores desde el controlador o modelo
                $proveedores = $productoController->obtenerProveedores();

                // Iterar sobre los proveedores y generar las opciones del select
                foreach ($proveedores as $idProveedor => $nombreProveedor) {
                    echo "<option value=\"$nombreProveedor\">$nombreProveedor</option>";
                }
            ?>
        </select><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
