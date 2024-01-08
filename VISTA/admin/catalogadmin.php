<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\ProductoController.php';
$productoController = new ProductoController($conn);
try {
    // Crear una instancia del controlador y pasar la conexión
    $productoController = new ProductoController($conn);

    // Llamar a la función para obtener categorías
    $categorias = $productoController->obtenerCategorias();

    // Obtener datos para mostrar
    $data = $productoController->obtenerProductos();
    $dataaux = $productoController->obtenerNombresProductos();

} catch (Exception $e) {
    // Manejar cualquier excepción que pueda ocurrir durante la ejecución
    echo "Error: " . $e->getMessage();
    die(); // Detener la ejecución en caso de error
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>FERRETERIA - CATALOGO</title>

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/assets/css/ollie.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalog.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/table.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/container.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/shoppingcart.css">
    <link rel="stylesheet" href="../../../PROYECTO-ING-WEB/VISTA/css/catalogadmin.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../../../PROYECTO-ING-WEB/VISTA/assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/indexloginadmin.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/Featured.php">DESTACADOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/catalogadmin.php">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/usuariosadmin.php">USUARIOS</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <!-- Cabecera -->
    <header class="container">
        <br>
        <h1>Ferretería Catálogo</h1>
        <br>
    </header>

    <table>
        <tr><button type="button" class="btn btn-agregar btn-block" onclick="window.location.href='agregarProducto.php'">Agregar Producto</button></tr>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Proveedor</th>
                <th>Precio</th>    
                <th>Funciones</th>
            </tr>
        </thead>
        <?php foreach ($categorias as $categoria_id => $categoria_nombre): ?>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <?php if (isset($row['nombre_producto']) && in_array($row['nombre_producto'], $dataaux) && isset($row['categoria_id_categoria']) && $row['categoria_id_categoria'] == $categoria_id): ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $row['ruta_imagen']; ?>" class="img-thumbnail custom-img" alt="<?php echo $row['nombre_producto']; ?>">
                                </td>
                                <td><?php echo $row['nombre_producto']; ?></td>
                                <td><?php echo $row['descripcion_producto']; ?></td>
                                <td><?php echo $row['cantidad_producto']; ?></td>
                                <td><?php echo $row['nombre_categoria']; ?></td>
                                <td><?php echo $row['nombre_marca']; ?></td>
                                <td><?php echo $row['nombre_proveedor']; ?></td>
                                <td>S/.<?php echo $row['precio_producto']; ?></td>
                                <td>
                                    <a href="modificarProducto.php?id=<?php echo $row['id_producto']; ?>" class="btn btn-modificar btn-block">MODIFICAR</a>
                                    <button class="btn btn-eliminar btn-block" onclick="eliminarProducto(<?php echo $row['id_producto']; ?>)">ELIMINAR</button>
                                </td>
                            </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        <?php endforeach; ?>
    </table>

    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/CerrarSesion.js"></script>
    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/productocontroller.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>

</html>
