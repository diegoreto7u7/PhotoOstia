// Función para insertar usuario
function insertarUsuario(username, contrasena, admin) {
    $.ajax({
        type: 'POST',
        url: 'registro.php',
        data: {
            action: 'insert_user',
            username: username,
            contrasena: contrasena,
            admin: admin
        },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.status === 'success') {
                alert(data.message);
            } else {
                alert('Error: ' + data.message);
            }
        },
        error: function() {
            alert('Error al realizar la petición AJAX');
        }
    });
}

// Función para obtener estadísticas de usuarios
function obtenerEstadisticasUsuarios() {
    $.ajax({
        type: 'GET',
        url: 'registro.php',
        data: {
            action: 'get_user_stats'
        },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.status === 'success') {
                console.log(data.stats); // Aquí puedes manejar las estadísticas recibidas
            } else {
                alert('Error: No se pudieron obtener las estadísticas');
            }
        },
        error: function() {
            alert('Error al realizar la petición AJAX');
        }
    });
}
