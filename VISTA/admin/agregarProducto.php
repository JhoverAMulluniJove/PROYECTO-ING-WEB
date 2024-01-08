<?php

require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Agregar Producto</title>

    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalog.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/table.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/container.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/shoppingcart.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalogadmin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/agregar_modificar.css">
</head>
<body>
    
    <br><h2>Agregar Nuevo Producto</h2>

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

        <select id="categoria" name="categoria">
            <?php
                $productoController = new ProductoController($conn);
                $categorias = $productoController->obtenerCategorias();

                foreach ($categorias as $idCategoria => $nombreCategoria) {
                    echo "<option value=\"$nombreCategoria\">$nombreCategoria</option>";
                }

            ?>
        </select><br>

        <label for="marca">Marca:</label>
        <select id="marca" name="marca">
            <?php
                $productoController = new ProductoController($conn);
                $marcas = $productoController->obtenerMarcas();

                foreach ($marcas as $idMarca => $nombreMarca) {
                    echo "<option value=\"$nombreMarca\">$nombreMarca</option>";
                }
            ?>
        </select><br>

        <label for="proveedor">Proveedor:</label>
        <select id="proveedor" name="proveedor">
            <?php
                $productoController = new ProductoController($conn);
                $proveedores = $productoController->obtenerProveedores();

                foreach ($proveedores as $idProveedor => $nombreProveedor) {
                    echo "<option value=\"$nombreProveedor\">$nombreProveedor</option>";
                }
            ?>
        </select><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
