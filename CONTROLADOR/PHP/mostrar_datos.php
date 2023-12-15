<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "artescocielo10";
$dbname = "ferreteria";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM producto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productos = array();

    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    echo json_encode($productos);
} else {
    echo json_encode(array("message" => "0 resultados"));
}

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Retorna los resultados en formato JSON
echo json_encode($data);
?>
?>