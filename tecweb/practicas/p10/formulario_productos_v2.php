<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <script>
        function validarFormulario() {
            const nombre = document.getElementById("nombre").value;
            const marca = document.getElementById("marca").value;
            const modelo = document.getElementById("modelo").value;
            const precio = parseFloat(document.getElementById("precio").value);
            const unidades = parseInt(document.getElementById("unidades").value);
            const detalles = document.getElementById("detalles").value;
            const imagen = document.getElementById("imagen").value;

            // Validaciones
            if (nombre.length > 100) {
                alert("El nombre debe tener 100 caracteres o menos.");
                return false;
            }

            if (marca.trim() === "") {
                alert("La marca es requerida.");
                return false;
            }

            if (modelo.length > 25 || modelo.trim() === "") {
                alert("El modelo debe ser alfanumérico y tener 25 caracteres o menos.");
                return false;
            }

            if (isNaN(precio) || precio <= 99.99) {
                alert("El precio debe ser mayor a 99.99.");
                return false;
            }

            if (isNaN(unidades) || unidades <= 0) {
                alert("Las unidades son requeridas y deben ser mayores a 0.");
                return false;
            }

            if (detalles.length > 250) {
                alert("Los detalles deben tener 250 caracteres o menos.");
                return false;
            }

            if (imagen.trim() === "") {
                document.getElementById("imagen").value = "img/default.jpg";
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Producto</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $host = 'localhost';
            $user = 'root'; 
            $password = '123456Dm'; 
            $database = 'marketzone'; 

            $conn = new mysqli($host, $user, $password, $database);

            // Comprobar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            // Establecer la codificación de caracteres a UTF-8
            $link->set_charset("utf8");

            // Obtener datos del formulario
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
                echo "<p>Producto actualizado con éxito.</p>";
            } else {
                echo "<p>Error al actualizar el producto: " . $stmt->error . "</p>";
            }

            // Cerrar conexión
            $stmt->close();
            $conn->close();
        } else {
            $id = $_GET['id'];
            $host = 'localhost';
            $user = 'root'; 
            $password = '123456Dm'; 
            $database = 'marketzone'; 

            $conn = new mysqli($host, $user, $password, $database);

            // Comprobar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM productos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $producto = $result->fetch_assoc();

            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="update_producto.php" method="post" onsubmit="return validarFormulario()">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <select class="form-control" id="marca" name="marca" required>
                    <option value="">Selecciona una marca</option>
                    <option value="Tupperware" <?php echo $producto['marca'] == 'Tupperware' ? 'selected' : ''; ?>>Tupperware</option>
                    <option value="Ultrachef" <?php echo $producto['marca'] == 'Ultrachef' ? 'selected' : ''; ?>>Ultrachef</option>
                    <option value="L&C HOME" <?php echo $producto['marca'] == 'L&C HOME' ? 'selected' : ''; ?>>L&C HOME</option>
                    <option value="FRUTIVEGIE" <?php echo $producto['marca'] == 'FRUTIVEGIE' ? 'selected' : ''; ?>>FRUTIVEGIE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo htmlspecialchars($producto['modelo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
            </div>
            <div class="form-group">
                <label for="unidades">Unidades:</label>
                <input type="number" class="form-control" id="unidades" name="unidades" value="<?php echo htmlspecialchars($producto['unidades']); ?>" required>
            </div>
            <div class="form-group">
                <label for="detalles">Detalles:</label>
                <textarea class="form-control" id="detalles" name="detalles" rows="3" required><?php echo htmlspecialchars($producto['detalles']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo htmlspecialchars($producto['imagen']); ?>" required>
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo htmlspecialchars($producto['id']); ?>"> <!-- Campo oculto para el ID del producto -->
            <button type="submit" class="btn btn-primary">Modificar Producto</button> 
            <button type="button" class="btn btn-secondary" onclick="history.back();">Cancelar</button>
        </form>
    </div>
</body>
</html>
