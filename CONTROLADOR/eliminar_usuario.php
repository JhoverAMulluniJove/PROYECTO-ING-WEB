<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\MODELO\conexion.php';
require_once 'C:\xampp\htdocs\PROYECTO-ING-WEB\CONTROLADOR\UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
    $idUsuario = $_POST['id_usuario'];

    try {

        $userModel = new UserModel($conn);

        if ($userModel->eliminarUsuario($idUsuario)) {
            echo 'success';
        } else {
            echo 'error al intentar eliminar el producto';
        }
    } catch (Exception $e) {
        echo 'error al intentar eliminar el producto: ' . $e->getMessage();
    }
} else {
    echo 'error: solicitud incorrecta';
}
?>
