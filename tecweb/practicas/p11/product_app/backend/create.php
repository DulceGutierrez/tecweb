<?php
include_once __DIR__.'/database.php';

// Verificamos si se ha recibido el JSON
if (isset($_POST['producto'])) {
    $producto = json_decode($_POST['producto'], true);

    // Validar que el producto tenga todos los campos necesarios
    if (!isset($producto['nombre'], $producto['precio'], $producto['unidades'], $producto['modelo'], $producto['marca'], $producto['detalles'])) {
        echo json_encode(['success' => false, 'message' => 'Faltan datos del producto.']);
        exit;
    }

    // Verificar si el producto ya existe
    $nombre = $conexion->real_escape_string($producto['nombre']);
    $checkQuery = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 1";
    $checkResult = $conexion->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'El producto ya existe y ha sido eliminado.']);
        exit;
    }

    // Insertar el nuevo producto
    $precio = $conexion->real_escape_string($producto['precio']);
    $unidades = $conexion->real_escape_string($producto['unidades']);
    $modelo = $conexion->real_escape_string($producto['modelo']);
    $marca = $conexion->real_escape_string($producto['marca']);
    $detalles = $conexion->real_escape_string($producto['detalles']);
    $imagen = $conexion->real_escape_string($producto['imagen'] ?? 'img/default.png');

    $insertQuery = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen, eliminado) VALUES ('$nombre', '$precio', '$unidades', '$modelo', '$marca', '$detalles', '$imagen', 0)";

    if ($conexion->query($insertQuery) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Producto insertado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error en la inserción: ' . $conexion->error]);
    }

    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún producto.']);
}
?>
