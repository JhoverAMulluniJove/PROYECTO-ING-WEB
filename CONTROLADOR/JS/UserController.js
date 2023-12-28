// Importa la función loginUser desde el controlador
import { iniciarSesion } from '../../PROYECTO-ING-WEB/CONTROLADOR/js/UserController.js';

function openRegisterWindow() {
    // Abre una nueva ventana para el formulario de registro
    window.open('registro.html', '_blank', 'width=400,height=400');
}

// Manejar el envío del formulario usando JavaScript
document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    // Obtener los valores del formulario
    const nombreUsuario = document.getElementById('nombre_usuario').value;
    const password = document.getElementById('password_usuario').value;

    // Llamar a la función loginUser definida en UserController.js
    loginUser(nombreUsuario, password);
});
