
function cerrarSesion() {

    var confirmacion = confirm("¿Estás seguro de cerrar sesión?");

    if (confirmacion) {
        window.location.href = "http://localhost/PROYECTO-ING-WEB/index.php";
    }
}
