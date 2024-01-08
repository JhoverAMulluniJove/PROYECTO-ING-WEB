
function cerrarSesion() {
    // Muestra un cuadro de diálogo de confirmación
    var confirmacion = confirm("¿Estás seguro de cerrar sesión?");

    // Si el usuario hace clic en "Aceptar", redirige a index.php
    if (confirmacion) {
        window.location.href = "http://localhost/PROYECTO-ING-WEB/index.php";
    } else {
        // Si el usuario hace clic en "Cancelar", no hagas nada
    }
}
