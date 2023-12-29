<?php
// Verificar si hay un error en la URL
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    // Mostrar mensaje de error correspondiente al tipo de error
    if ($error === 'conexion') {
        echo '<p style="color: red;">Error de conexión a la base de datos</p>';
    } elseif ($error === 'credenciales') {
        // Verificar si se proporcionó un mensaje adicional
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