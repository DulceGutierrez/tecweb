<?php
function comprobarMultiplo57($num) {
    if ($num % 5 == 0 && $num % 7 == 0) {
        return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}

function generarSecuencia() {
    $numeros = [];
    $iteraciones = 0;

    do {
        $fila = [];
        for ($i = 0; $i < 3; $i++) {
            $numero = rand(0, 999);
            $fila[] = $numero;
        }
        $numeros[] = $fila;
        $iteraciones++;
    } while (!($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0));

    $resultado = "<h3>Iteraciones: $iteraciones</h3>";
    $resultado .= "<h3>Números generados:</h3><ul>";
    foreach ($numeros as $fila) {
        $resultado .= "<li>" . implode(", ", $fila) . "</li>";
    }
    $resultado .= "</ul>";
    $resultado .= "<h3>Total de números: " . ($iteraciones * 3) . "</h3>";
    return $resultado;
}

function encontrarMultiploWhile($num) {
    $iteraciones = 0;
    $numero = rand(0, 999);

    while ($numero % $num != 0) {
        $numero = rand(0, 999);
        $iteraciones++;
    }

    return "<h3>Primer múltiplo de $num encontrado (while): $numero en $iteraciones iteraciones</h3>";
}

function encontrarMultiploDoWhile($num) {
    $iteraciones = 0;
    do {
        $numero = rand(0, 999);
        $iteraciones++;
    } while ($numero % $num != 0);

    return "<h3>Primer múltiplo de $num encontrado (do-while): $numero en $iteraciones iteraciones</h3>";
}

function crearArregloLetras() {
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }

    $tabla = "<table border='1'><tr><th>Índice</th><th>Valor</th></tr>";
    foreach ($arreglo as $key => $value) {
        $tabla .= "<tr><td>$key</td><td>$value</td></tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}

function comprobarEdadSexo($edad, $sexo) {
    if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
        return "<h3>Bienvenida, usted está en el rango de edad permitido.</h3>";
    } else {
        return "<h3>Usted no cumple con los requisitos.</h3>";
    }
}


?>
