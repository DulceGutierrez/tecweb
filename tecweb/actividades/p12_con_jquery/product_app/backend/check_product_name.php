<?php
include_once __DIR__.'/database.php';

$response = array('exists' => false);

if (isset($_POST['productName'])) {
    $productName = $_POST['productName'];
    $sql = "SELECT * FROM productos WHERE nombre = '$productName' AND eliminado = 0";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $response['exists'] = true;
    }

    $result->free();
    $conexion->close();
}

echo json_encode($response);
?>
