<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        include 'src/funciones.php';
        if(isset($_GET['numero'])) {
            $num = $_GET['numero'];
            echo comprobarMultiplo57($num);
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por impar, par, impar</p>
    <?php
        if(isset($_GET['ejercicio']) && $_GET['ejercicio'] == 2){
            echo generarSecuencia();
        }
    ?>

    <h2>Ejercicio 3</h2>
    <p>Encontrar el primer número entero obtenido aleatoriamente que sea múltiplo de un número dado (while y do-while)</p>
    <?php
        if(isset($_GET['multiplo'])) {
            $num = $_GET['multiplo'];
            echo encontrarMultiploWhile($num);
            echo encontrarMultiploDoWhile($num);
        }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’</p>
    <?php
        if(isset($_GET['ejercicio']) && $_GET['ejercicio'] == 4) {
            echo crearArregloLetras();
        }
    ?>

    <h2>Ejercicio 5</h2>
    <p>Identificar si una persona de sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de bienvenida apropiado.</p>
    <form method="post" action="">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required>
        <br>
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <br>
        <button type="submit" name="submit5">Enviar</button>
    </form>
    <?php
        if (isset($_POST['submit5'])) {
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];
            echo comprobarEdadSexo($edad, $sexo);
        }
    ?>

    <h2>Ejercicio 6</h2>
    <h2>Consulta de Parque Vehicular</h2>
    <form action="index.php" method="post">
        <label for="matricula">Consultar por matrícula:</label>
        <input type="text" id="matricula" name="matricula">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <form action="index.php" method="post">
        <button type="submit" name="todos">Mostrar todos los autos</button>
    </form>

    <?php
    if (isset($_POST['buscar'])) {
        $matricula = strtoupper($_POST['matricula']);
        $auto = buscarPorMatricula($matricula);
        if ($auto) {
            echo "<h2>Información del Auto</h2>";
            echo "<p>Matrícula: $matricula</p>";
            echo "<p>Marca: " . $auto['Auto']['marca'] . "</p>";
            echo "<p>Modelo: " . $auto['Auto']['modelo'] . "</p>";
            echo "<p>Tipo: " . $auto['Auto']['tipo'] . "</p>";
            echo "<h2>Información del Propietario</h2>";
            echo "<p>Nombre: " . $auto['Propietario']['nombre'] . "</p>";
            echo "<p>Ciudad: " . $auto['Propietario']['ciudad'] . "</p>";
            echo "<p>Dirección: " . $auto['Propietario']['direccion'] . "</p>";
        } else {
            echo "<p>No se encontró información para la matrícula: $matricula</p>";
        }
    }

    if (isset($_POST['todos'])) {
        $todos = obtenerTodosLosAutos();
        echo "<h2>Parque Vehicular</h2>";
        echo "<pre>";
        print_r($todos);
        echo "</pre>";
    }
    ?>
</body>
</html>