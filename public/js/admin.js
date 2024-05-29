$(document).ready(function() {
    // Obtener usuarios al cargar la página
    fetchUsuarios();

    // Función para obtener usuarios
    function fetchUsuarios() {
        $.ajax({
            url: '/api/usuarios', // Asegúrate de que la ruta coincide con tu API
            method: 'GET',
            success: function(data) {
                renderUsuarios(data);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    // Función para renderizar usuarios
    function renderUsuarios(usuarios) {
        $('#userList').empty();
        usuarios.forEach(usuario => {
            $('#userList').append(`
                <li class="user-item">
                    <span class="user-name">${usuario.username}</span>
                    <button class="editButton" data-id="${usuario.id_usuario}">Edit</button>
                    <button class="deleteButton" data-id="${usuario.id_usuario}">Delete</button>
                </li>
            `);
        });
    }

    // Crear usuario
    $('.edit-form').on('submit', function(e) {
        e.preventDefault();
        const username = $('#username-edit').val();
        const contrasena = $('#contrasena-edit').val();
        const admin = $('#admin-edit').is(':checked') ? 1 : 0;
        const id_usuario = $(this).data('id');

        if (id_usuario) {
            // Actualizar usuario
            $.ajax({
                url: `/api/usuarios/${id_usuario}`,
                method: 'PUT',
                data: { username, contrasena, admin },
                success: function(response) {
                    swal("Success!", response.message, "success");
                    fetchUsuarios();
                    $('#editContainer').hide();
                },
                error: function(error) {
                    console.error('Error:', error);
                    swal("Error!", "Could not update user.", "error");
                }
            });
        } else {
            // Crear usuario
            $.ajax({
                url: '/api/usuarios',
                method: 'POST',
                data: { username, contrasena, admin },
                success: function(response) {
                    swal("Success!", response.message, "success");
                    fetchUsuarios();
                },
                error: function(error) {
                    console.error('Error:', error);
                    swal("Error!", "Could not create user.", "error");
                }
            });
        }
    });

    // Eliminar usuario
    $('#userList').on('click', '.deleteButton', function() {
        const id_usuario = $(this).data('id');
        $.ajax({
            url: `/api/usuarios/${id_usuario}`,
            method: 'DELETE',
            success: function(response) {
                swal("Success!", response.message, "success");
                fetchUsuarios();
            },
            error: function(error) {
                console.error('Error:', error);
                swal("Error!", "Could not delete user.", "error");
            }
        });
    });

    // Mostrar formulario de edición con datos del usuario
    $('#userList').on('click', '.editButton', function() {
        const id_usuario = $(this).data('id');
        const user = $(this).siblings('.user-name').text();
        $('#username-edit').val(user);
        $('#editContainer').data('id', id_usuario).show();
    });
});
