<?php
    session_start();
    require_once '../MODELO/productoModelo.php';
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "ferreteria";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    // Verificar la conexión
    if ($conexion->connect_error) {
        // Si la conexión falla, redirigir a login.php con un mensaje de error
        header("Location: ../VISTA/login.php?error=conexion");
        exit();
    }

    $productoModelo = new ProductoModelo($conexion);

    if($productoModelo->seleccionarDestacados($nP1, $nP2, $nP3, $nP4, $nP5)){
        header("Location: ../VISTA/admin/offer.php");
        exit();
    }
?>