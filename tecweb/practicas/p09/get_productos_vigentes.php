<?php
// Conexión a la base de datos
$link = new mysqli('localhost', 'root', '123456Dm', 'marketzone');

// Comprobar la conexión
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

// Establecer la codificación de caracteres a UTF-8
$link->set_charset("utf8"); 

// Consulta para obtener productos que no están eliminados
$query = "SELECT * FROM productos WHERE eliminado = 0";
$result = $link->query($query);

// Encabezados de la tabla en XHTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos Vigentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>Productos Vigentes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Detalles</th>
            <th>Imagen</th>
        </tr>';

// Mostrar productos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['nombre']) . "</td>
                <td>" . htmlspecialchars($row['marca']) . "</td>
                <td>" . htmlspecialchars($row['modelo']) . "</td>
                <td>" . htmlspecialchars($row['precio']) . "</td>
                <td>" . htmlspecialchars($row['unidades']) . "</td>
                <td>" . htmlspecialchars($row['detalles']) . "</td>
                <td>" . htmlspecialchars($row['imagen']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay productos vigentes.</td></tr>";
}

echo '    </table>
</body>
</html>';

// Cerrar la conexión
$link->close();
?>
