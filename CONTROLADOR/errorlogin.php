<?php

if (isset($_GET['error'])) {
    $error = $_GET['error'];

    if ($error === 'conexion') {
        echo '<p style="color: red;">Error de conexión a la base de datos</p>';
    } elseif ($error === 'credenciales') {

        $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
        
        if ($mensaje === 'usuario') {
            echo '<p style="color: red;">Usuario y contraseña incorrecto</p>';
        } 
        elseif ($mensaje === 'contrasena') {
            echo '<p style="color: red;">Contraseña incorrecta</p>';
        } 
        else {
            echo '<p style="color: red;">Usuario o contraseña incorrectos</p>';
        }
    }
}
?>