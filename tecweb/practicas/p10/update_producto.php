<?php
$host = 'localhost';
$user = 'root'; 
$password = '123456Dm'; 
$database = 'marketzone'; 

$conn = new mysqli($host, $user, $password, $database);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
var_dump($_POST); 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
$detalles = $_POST['detalles'];
$imagen = $_POST['imagen'];

// Preparar la consulta SQL
$sql = "UPDATE productos SET nombre=?, marca=?, modelo=?, precio=?, unidades=?, detalles=?, imagen=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdissi", $nombre, $marca, $modelo, $precio, $unidades, $detalles, $imagen, $id);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Producto actualizado con éxito.";
} else {
    echo "Error al actualizar el producto: " . $stmt->error; // Muestra el error si hay uno
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
