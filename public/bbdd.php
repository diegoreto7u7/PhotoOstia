<?php

function connect_database()
{
    $username = 'c##photoplay';
    $password = 'almi123';
    $connection_string = '//3.221.255.12:1521/ORCLCDB';  

    $conn = oci_connect($username, $password, $connection_string);

    if (!$conn) {
        $error = oci_error();
        echo "Oracle connection error: " . $error['message'];
        exit;
    } else {
        echo "Oracle connection success";
    }
    return $conn;
}

function change_username($username, $newUsername) {
    $conn = connect_database();
    
    $sql = "UPDATE usuario SET username = :newUsername WHERE username = :username";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':newUsername', $newUsername);
    oci_bind_by_name($stmt, ':username', $username);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return false;
    }

    oci_free_statement($stmt);
    oci_close($conn);
    return true;
}

function change_score($score, $newScore, $fecha, $newFecha) {
    $conn = connect_database();
    
    $sql = "UPDATE partida SET puntuacion = :newPuntuacion, fecha = :newFecha WHERE puntuacion = :puntuacion AND fecha = :fecha";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':newPuntuacion', $newScore);
    oci_bind_by_name($stmt, ':newFecha', $newFecha);
    oci_bind_by_name($stmt, ':puntuacion', $score);
    oci_bind_by_name($stmt, ':fecha', $fecha);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return false;
    }

    oci_free_statement($stmt);
    oci_close($conn);
    return true;
}

function get_users() {
    $conn = connect_database();
    
    $sql = "SELECT * FROM usuario";
    $stmt = oci_parse($conn, $sql);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return [];
    }

    $users = [];
    while ($row = oci_fetch_assoc($stmt)) {
        $users[] = $row;
    }

    oci_free_statement($stmt);
    oci_close($conn);
    return $users;
}

function get_scores_user($id_usuario) {
    $conn = connect_database();
    
    $sql = "SELECT * FROM partida WHERE id_usuario = :id_usuario";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':id_usuario', $id_usuario);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return [];
    }

    $scores = [];
    while ($row = oci_fetch_assoc($stmt)) {
        $scores[] = $row;
    }

    oci_free_statement($stmt);
    oci_close($conn);
    return $scores;
}

function get_scores() {
    $conn = connect_database();
    
    $sql = "SELECT usuario.username, partida.puntuacion FROM partida INNER JOIN usuario ON partida.id_usuario = usuario.id_usuario";
    $stmt = oci_parse($conn, $sql);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return [];
    }

    $scores = [];
    while ($row = oci_fetch_assoc($stmt)) {
        $scores[] = $row;
    }

    oci_free_statement($stmt);
    oci_close($conn);
    return $scores;
}

function login($username, $password) {
    $conn = connect_database();
    
    $sql = "SELECT id_usuario FROM usuario WHERE username = :username AND contrasena = :password";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':username', $username);
    oci_bind_by_name($stmt, ':password', $password);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return false;
    }

    $user = oci_fetch_assoc($stmt);
    oci_free_statement($stmt);
    oci_close($conn);

    return $user ? $user['id_usuario'] : false;
}

function get_user($username, $password) {
    $conn = connect_database();
    
    $sql = 'SELECT * FROM usuario WHERE username = :username AND contrasena = :password';
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':username', $username);
    oci_bind_by_name($stmt, ':password', $password);

    $result = oci_execute($stmt);

    if (!$result) {
        $error = oci_error($stmt);
        echo "Error en la ejecución: " . $error['message'];
        oci_free_statement($stmt);
        oci_close($conn);
        return false;
    }

   

    $row = oci_fetch_assoc($stmt);
    oci_free_statement($stmt);
    oci_close($conn);

    return $row;
}
?>
