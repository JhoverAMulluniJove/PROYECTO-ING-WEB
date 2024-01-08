<?php
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\productoModelo.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';

$idUsuario = isset($_GET['id']) ? $_GET['id'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Modificar Usuario</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalog.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/table.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/container.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/shoppingcart.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalogadmin.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/usuario.css">

</head>

<body>

    <br><h2>Modificar Usuario</h2>

    <form action="../../CONTROLADOR/modificarUsuarioController.php" method="post">
        <label for="id_usuario">Id de Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $idUsuario; ?>" required><br>

            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <br>
            <label for="password_usuario">Contraseña:</label>
            <input type="password" id="password_usuario" name="password_usuario" required>
            <br>
            <label for="Nombre_cliente">Nombre:</label>
            <input type="text" id="Nombre_cliente" name="Nombre_cliente" required>
            <br>
            <label for="Apellido_cliente">Apellido:</label>
            <input type="text" id="Apellido_cliente" name="Apellido_cliente" required>
            <br>
            <label for="DNI">DNI:</label>
            <input type="text" id="DNI" name="DNI" pattern="\d+" title="Solo se permiten números" required>
            <br>
            <label for="Telefono_cliente">Telefono/Celular:</label>
            <input type="text" id="Telefono_cliente" name="Telefono_cliente" pattern="\d+" title="Solo se permiten números" required>
            <br>
            <label for="direccion_cliente">Dirección:</label>
            <input type="text" id="direccion_cliente" name="direccion_cliente" required>
            <br>
            <label for="email_cliente">Correo Electrónico:</label>
            <input type="text" id="email_cliente" name="email_cliente" required>
            <br>

        <button type="submit">Modificar Usuario</button>
    </form>
</body>
</html>