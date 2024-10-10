<?php
$link = mysqli_connect('localhost', 'root','123456Dm','marketzone');

// Comprobar conexión
if($link === false){
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}
// Establecer la codificación de caracteres a UTF-8
$link->set_charset("utf8");

// Verificar si los datos vienen por POST o GET
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $marca = $_POST['marca'] ?? null;
    $modelo = $_POST['modelo'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $unidades = $_POST['unidades'] ?? null;
    $detalles = $_POST['detalles'] ?? null;
    $imagen = $_POST['imagen'] ?? null;
} else {
    $id = $_GET['id'] ?? null;
    $nombre = $_GET['nombre'] ?? null;
    $marca = $_GET['marca'] ?? null;
    $modelo = $_GET['modelo'] ?? null;
    $precio = $_GET['precio'] ?? null;
    $unidades = $_GET['unidades'] ?? null;
    $detalles = $_GET['detalles'] ?? null;
    $imagen = $_GET['imagen'] ?? null;
}

// Verificar si todos los datos necesarios están presentes
if ($id && $nombre && $marca && $modelo && $precio && $unidades && $detalles && $imagen) {
    // Escapar las variables para prevenir SQL injection
    $id = mysqli_real_escape_string($link, $id);
    $nombre = mysqli_real_escape_string($link, $nombre);
    $marca = mysqli_real_escape_string($link, $marca);
    $modelo = mysqli_real_escape_string($link, $modelo);
    $precio = mysqli_real_escape_string($link, $precio);
    $unidades = mysqli_real_escape_string($link, $unidades);
    $detalles = mysqli_real_escape_string($link, $detalles);
    $imagen = mysqli_real_escape_string($link, $imagen);

    // Preparar la consulta SQL
    $sql = "UPDATE productos SET 
                nombre='$nombre', 
                marca='$marca', 
                modelo='$modelo', 
                precio=$precio, 
                unidades=$unidades, 
                detalles='$detalles', 
                imagen='$imagen' 
            WHERE id=$id";

    // Ejecutar la consulta
    if(mysqli_query($link, $sql)){
        echo "<h1> Producto actualizado con éxito.</h1>";
        ?>
        <div class="mt-3" role="group" aria-label="Navegación">
            <button type="button" href="formulario_productos.html" class="btn btn-primary">Formulario Productos </button><br>
            <button type="button" href="get_productos_vigentes_v2.php" class="btn btn-secondary">Productos Vigentes</button><br>
            <button type="button" href="get_producto_xhtml_v2.php" class="btn btn-success">Producto_tope</button><br>
            <button type="button" class="btn btn-secondary" onclick="history.back();">Cancelar</button>

        </div>
        <?php
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($link); // Muestra el error si hay uno
    }
    } else {
        echo 'Datos incompletos. Asegúrese de que todos los campos están llenos.';
    }

// Cerrar conexión
mysqli_close($link);
?>
