function modificarProducto() {
    // Aquí puedes agregar lógica para modificar un producto en JavaScript
    // Puedes enviar datos al servidor mediante AJAX o realizar otras operaciones según tus necesidades
    console.log('Función modificarProducto() ejecutada');
}

function eliminarProducto() {
    window.location.href = "ProductoController.php"
    var confirmacion = confirm('¿Estás seguro de que deseas eliminar el producto?');
    
    if (confirmacion) {
        // Aquí puedes agregar lógica para eliminar un producto en JavaScript
        // Puedes enviar datos al servidor mediante AJAX o realizar otras operaciones según tus necesidades
        console.log('Función eliminarProducto() ejecutada');
        
        // También puedes redirigir a una página de confirmación o realizar otras acciones después de eliminar
    }
}
function mostrarFormulario() {
    // Muestra el formulario o modal
    document.getElementById('formularioAgregar').style.display = 'block';
}

function agregarProducto() {
    // Obtén los valores de los campos de entrada
    var nombre = document.getElementById('nombreProducto').value;
    var descripcion = document.getElementById('descripcionProducto').value;
    // Obtén otros campos de entrada según sea necesario

    // Llama a la función en el controlador para agregar el producto
    productoController.agregarProducto(nombre, descripcion, /* otros campos */);

    // Oculta el formulario o modal después de agregar el producto
    document.getElementById('formularioAgregar').style.display = 'none';
}