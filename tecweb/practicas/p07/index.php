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

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
    
</body>
</html>