<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h2>Productos Vigentes</h2>
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
    echo '<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>
            <tbody>';

    // Mostrar productos
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['nombre']) . '</td>
                    <td>' . htmlspecialchars($row['marca']) . '</td>
                    <td>' . htmlspecialchars($row['modelo']) . '</td>
                    <td>' . htmlspecialchars($row['precio']) . '</td>
                    <td>' . htmlspecialchars($row['unidades']) . '</td>
                    <td>' . htmlspecialchars($row['detalles']) . '</td>
                    <td><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen del producto" class="img-thumbnail" /></td>
                    <td><a href="formulario_productos_v2.html?id=' . $row['id'] . '">Modificar</a></td>
                  </tr>';
        }
    } else {
        echo '<tr><td colspan="8">No hay productos vigentes.</td></tr>';
    }

    echo '</tbody></table>';

    // Cerrar la conexión
    $link->close();
    ?>
</body>
</html>
