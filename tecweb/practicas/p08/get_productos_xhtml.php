<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
</head>
<body>
    <h3>Lista de Productos</h3>
    <br/>
    <?php
    $data = array();

    if (isset($_GET['tope'])) {
        $tope = intval($_GET['tope']);
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope)) {
        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', '123456Dm', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        /** Crear una tabla que no devuelve un conjunto de resultados */
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            $row = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

        $link->close();
    }
    ?>

    <?php if (!empty($row)) : ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $registro) : ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($registro['id'] ?? '') ?></th>
                        <td><?= htmlspecialchars($registro['nombre'] ?? '') ?></td>
                        <td><?= htmlspecialchars($registro['marca'] ?? '') ?></td>
                        <td><?= htmlspecialchars($registro['modelo'] ?? '') ?></td>
                        <td><?= htmlspecialchars($registro['precio'] ?? '') ?></td>
                        <td><?= htmlspecialchars($registro['unidades'] ?? '') ?></td>
                        <td><?= htmlspecialchars($registro['detalles'] ?? '') ?></td>
                        <td><img src="<?= htmlspecialchars($registro['imagen'] ?? '') ?>" alt="Imagen del producto" width="50" height="50" /></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <script type="text/javascript">
            alert('No se encontraron productos con el número de unidades especificado');
        </script>
    <?php endif; ?>
</body>
</html>
