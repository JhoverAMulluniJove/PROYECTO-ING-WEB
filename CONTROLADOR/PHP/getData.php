<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Dirección del servidor de la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = "artescocielo10"; // Contraseña de la base de datos
$dbname = "ferreteria"; // Nombre de la base de datos

// Crear una nueva instancia de la clase mysqli para establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si hay un error, detener el script y mostrar un mensaje
}

// Consultar datos de la base de datos
$sql = "SELECT nombre_producto, descripcion_producto, precio_producto, cantidad_producto FROM producto"; // Consulta SQL para seleccionar todos los registros de la tabla especificada
$result = $conn->query($sql); // Ejecutar la consulta y almacenar el resultado en la variable $result

$data = array(); // Inicializar un array para almacenar los datos recuperados de la base de datos

// Recorrer cada fila del resultado y agregarla al array $data
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
