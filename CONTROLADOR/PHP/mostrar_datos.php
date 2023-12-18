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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Productos</title>
    <style>
        /* Estilos para mejorar la apariencia de la tabla */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

    <!-- Tabla para mostrar los datos -->
    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Descripción del Producto</th>
                <th>Precio del Producto</th>
                <th>Cantidad en Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['nombre_producto']; ?></td>
                    <td><?php echo $row['descripcion_producto']; ?></td>
                    <td><?php echo $row['precio_producto']; ?></td>
                    <td><?php echo $row['cantidad_producto']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
