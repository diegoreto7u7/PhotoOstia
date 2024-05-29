<?php
try {
    $conn = oci_connect('c##photoplay', 'almi123', '3.221.255.12:1521/ORCLCDB');
    
    if (!$conn) {
        $e = oci_error();
        throw new Exception(htmlentities($e['message'], ENT_QUOTES));
    }

    echo "Conexión a Oracle establecida correctamente";
    var_dump("hjdfshdsfudshfdshf");
} catch (Exception $e) {
    echo "No se pudo establecer la conexión a Oracle: " . $e->getMessage();
} finally {
    if ($conn) {
        oci_close($conn);
    }
}
?>
