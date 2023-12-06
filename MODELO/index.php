<?php
// Ruta del archivo HTML
$rutaArchivoHTML = 'C:\xampp\htdocs\PROYECTO-ING-WEB\VISTA\HTML\index.html';

// Intentar abrir y leer el archivo HTML
$contenidoHTML = file_get_contents($rutaArchivoHTML);

// Verificar si la lectura fue exitosa
if ($contenidoHTML !== false) {
    // El archivo se leyó correctamente, puedes imprimir su contenido o realizar otras operaciones
    echo $contenidoHTML;
} else {
    // Ocurrió un error al intentar leer el archivo
    echo 'No se pudo leer el archivo HTML.';
}
?>
