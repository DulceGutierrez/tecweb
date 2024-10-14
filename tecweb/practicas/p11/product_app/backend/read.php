<?php
    include_once __DIR__.'/database.php';

    $data = array();

    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        $query = "SELECT * FROM productos WHERE id = '{$id}'";
    } else if( isset($_POST['search']) ) {
        $search = $_POST['search'];
        $query = "SELECT * FROM productos WHERE nombre LIKE '%$search%' OR marca LIKE '%$search%' OR detalles LIKE '%$search%'";
    }

    if (isset($query) && $result = $conexion->query($query)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $product = array();
            foreach ($row as $key => $value) {
                $product[$key] = utf8_encode($value);
            }
            $data[] = $product;
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($conexion));
    }

    $conexion->close();

    echo json_encode($data, JSON_PRETTY_PRINT);
?>
