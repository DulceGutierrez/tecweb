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

</body>
</html>