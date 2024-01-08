<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\UsuarioController.php';

try {

    $usuarioController = new UsuarioController($conn);

    $data1 = $usuarioController->obtenerUsuarios(); 
    $data1aux = $usuarioController->obtenerNombresUsuarios();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    die();
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

    <title>FERRETERIA - USUARIOS</title>

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
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/catalogadmin.php">CATALOGO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../PROYECTO-ING-WEB/VISTA/admin/usuariosadmin.php">USUARIOS</a></li>
                    <li class="nav-item"><a class="btn btn-primary" href="#" onclick="cerrarSesion()">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <header class="container">
        <br>
        <h1>Ferretería Usuarios</h1>
        <br>
    </header>

    <table>
        <tr><button type="button" class="btn btn-agregar btn-block" onclick="window.location.href='agregarUsuario.php'">Agregar Usuario</button></tr>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data1 as $row): ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['nombre_usuario']; ?></td>
                    <td><?php echo $row['password_usuario']; ?></td>
                    <td><?php echo $row['DNI']; ?></td>
                    <td><?php echo $row['Nombre_cliente']; ?></td>
                    <td><?php echo $row['Apellido_cliente']; ?></td>
                    <td><?php echo $row['Telefono_cliente']; ?></td>
                    <td><?php echo $row['email_cliente']; ?></td>
                    <td><?php echo $row['direccion_cliente']; ?></td>
                    <td>
                        <a href="modificarUsuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-modificar btn-block">MODIFICAR</a>
                        <button class="btn btn-eliminar btn-block" onclick="eliminarUsuario(<?php echo $row['id_usuario']; ?>)">ELIMINAR</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="../../../PROYECTO-ING-WEB/CONTROLADOR/js/CerrarSesion.js"></script>
    <script src="eliusu.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>

</html>
