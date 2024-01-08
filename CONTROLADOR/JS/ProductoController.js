function eliminarProducto(idProducto) {
    if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
        $.ajax({
            type: 'POST',
            url: '../../CONTROLADOR/eliminar_producto.php', 
            data: { id_producto: idProducto },
            success: function (response) {
                if (response === 'success') {
                    
                    alert('Producto eliminado exitosamente');
                    location.reload(); 
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