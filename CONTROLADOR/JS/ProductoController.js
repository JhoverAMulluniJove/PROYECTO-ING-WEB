function eliminarProducto(idProducto) {
    if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
        $.ajax({
            type: 'POST',
            url: '../../CONTROLADOR/eliminar_producto.php', // Ruta al archivo PHP que manejará la eliminación
            data: { id_producto: idProducto },
            success: function (response) {
                if (response === 'success') {
                    // Actualizar la interfaz o realizar otras acciones si es necesario
                    alert('Producto eliminado exitosamente');
                    location.reload(); // Recargar la página, por ejemplo
                } else {
                    alert('Error al intentar eliminar el producto');
                }
            },
            error: function () {
                alert('Error de conexión al intentar eliminar el producto');
            }
        });
    }
}
function modificarProducto(idProducto, nuevoNombre, nuevaDescripcion, nuevoPrecio, nuevaCantidad, nuevaCategoria, nuevaMarca, nuevoProveedor) {
    $.ajax({
        type: 'POST',
        url: '../../CONTROLADOR/modificar_producto.php', // Ruta al archivo PHP que manejará la modificación
        data: {
            id_producto: idProducto,
            nombre: nuevoNombre,
            descripcion: nuevaDescripcion,
            precio: nuevoPrecio,
            cantidad: nuevaCantidad,
            categoria: nuevaCategoria,
            marca: nuevaMarca,
            proveedor: nuevoProveedor
        },
        success: function (response) {
            if (response === 'success') {
                // Actualizar la interfaz o realizar otras acciones si es necesario
                alert('Producto modificado exitosamente');
                location.reload(); // Recargar la página, por ejemplo
            } else {
                alert('Error al intentar modificar el producto');
            }
        },
        error: function () {
            alert('Error de conexión al intentar modificar el producto');
        }
    });
}
