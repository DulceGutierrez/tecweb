<?php
// Conexión a la base de datos
$link = new mysqli('localhost', 'root', '12345678a', 'marketzone');

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
$detalles = $_POST['detalles'];
$imagen = $_POST['imagen'];

// Validar que el nombre, modelo y la marca no existan ya en la BD
$query = "SELECT * FROM productos WHERE nombre='$nombre' AND marca='$marca' AND modelo='$modelo'";
$result = $link->query($query);

if ($result->num_rows > 0) {
    echo "El producto ya existe en la base de datos.";
} else {
    // Comentar la query actual de inserción
    // $query = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen, eliminado) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$unidades', '$detalles', '$imagen', 0)";
    
    // Nueva query usando nombres de columnas
    $query = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$unidades', '$detalles', '$imagen')";
    
    if ($link->query($query) === TRUE) {
        echo "Producto registrado con éxito.";
    } else {
        echo "Error: " . $query . "<br>" . $link->error;
    }
}

// Cerrar la conexión
$link->close();
?>