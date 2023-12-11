<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "ferreteria";
$tbl1_name = "usuario";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

// Verificar la conexión
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$nombre = $_POST['nombre_usuario'];
$clave = $_POST['password_usuario'];

$sql = "SELECT * FROM $tbl1_name WHERE nombre_usuario = '$nombre'";
$result = $conexion->query($sql);

// Verificar la ejecución de la consulta
if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}

// Verificar si hay filas devueltas
if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($clave == $row['password_usuario']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre_usuario'] = $nombre;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60); 
        include("index.php");
    } else {
        echo "Nombre o Contraseña están incorrectos.";
    }
} else {
    echo "Usuario no encontrado.";
}

mysqli_close($conexion);
?>
