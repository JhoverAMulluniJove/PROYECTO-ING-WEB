// Realizar una solicitud AJAX para obtener los datos del archivo PHP
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualizar el contenido del contenedor con los datos obtenidos
        document.getElementById('datos-container').innerHTML = xhr.responseText;
    }
};
xhr.open('GET', 'mostrar_datos.php', true);
xhr.send();