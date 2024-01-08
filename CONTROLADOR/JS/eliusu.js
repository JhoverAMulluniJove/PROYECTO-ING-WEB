function eliminarUsuario(idUsuario) {
    if (confirm('¿Estás seguro de que quieres eliminar a este usuario?')) {
        $.ajax({
            type: 'POST',
            url: '../../CONTROLADOR/eliminar_usuario.php', 
            data: { id_usuario: idUsuario },
            success: function (response) {
                if (response === 'success') {
                    
                    alert('Usuario eliminado exitosamente');
                    location.reload(); 
                } else {
                    alert('Error al intentar eliminar el usuario');
                }
            },
            error: function () {
                alert('Error de conexión al intentar eliminar el usuario');
            }
        });
    }
}