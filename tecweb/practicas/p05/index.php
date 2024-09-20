<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Práctica 05 - Validación XHTML</title>
</head>
<body>
    <?php
    /* Ejercicio 1 */
    echo "<h2>Ejercicio 1</h2>";
    echo "<p>La variable \$_myvar es válida porque comienza con un guion bajo y un carácter válido.</p>";
    echo "<p>La variable \$_7var es válida porque comienza con un guion bajo y un número.</p>";
    echo "<p>La variable myvar NO es válida porque no comienza con un signo de dólar.</p>";
    echo "<p>La variable \$myvar es válida porque comienza con un signo de dólar seguido de un nombre válido.</p>";
    echo "<p>La variable \$var7 es válida porque comienza con un signo de dólar seguido de un nombre válido.</p>";
    echo "<p>La variable \$_element1 es válida porque comienza con un guion bajo seguido de un nombre válido.</p>";
    echo "<p>La variable \$house*5 NO es válida porque contiene un carácter no permitido (*).</p>";

    /* Ejercicio 2 */
    echo "<h2>Ejercicio 2</h2>";
    /* Primeras asignaciones */
    echo "<h3>Primera asignación</h3>";
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo "<p>Valor de \$a: $a</p>";
    echo "<p>Valor de \$b: $b</p>";
    echo "<p>Valor de \$c: $c</p>";
    /* Segunda asignación */
    echo "<h3>Segunda asignación</h3>";
    $a = "PHP server";
    $b = &$a;
    echo "<p>Valor de \$a: $a</p>";
    echo "<p>Valor de \$b: $b</p>";
    echo "<p>Valor de \$c: $c</p>";

    echo "<h3>¿Qué ocurrió?</h3>";
    echo "<p>Al asignar \$b = &amp;\$a, \$b se convierte en una referencia a \$a. Por lo tanto, cualquier cambio en \$a se refleja en \$b y en \$c porque son referencias al valor de \$a.</p>";

    /* Ejercicio 3 */
    echo "<h2>Ejercicio 3</h2>";
    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    echo "<p>Valor de \$a después de asignación: $a</p>";
    echo "<p>Valor de \$z[0]: " . print_r($z, true) . "</p>";
    echo "<p>Valor de \$b: $b</p>";
    $c = (int)$b * 10;
    echo "<p>Valor de \$c: $c</p>";
    $a .= $b;
    $b *= $c;
    $z[0] = "MySQL";
    echo "<h3>Después de todas las asignaciones:</h3>";
    echo "<p>Valor de \$a: $a</p>";
    echo "<p>Valor de \$b: $b</p>";
    echo "<p>Valor de \$c: $c</p>";
    echo "<p>Valor de \$z[0]: " . print_r($z, true) . "</p>";

    /* Ejercicio 4 */
    echo "<h2>Ejercicio 4</h2>";
    /* Uso de global */
    global $a, $b, $c, $z;
    echo "<h3>Usando global:</h3>";
    echo "<p>Valor de \$a: $a</p>";
    echo "<p>Valor de \$b: $b</p>";
    echo "<p>Valor de \$c: $c</p>";
    echo "<p>Valor de \$z[0]: " . print_r($z, true) . "</p>";
    /* Uso de $GLOBALS */
    echo "<h3>Usando \$GLOBALS:</h3>";
    echo "<p>Valor de \$a: " . $GLOBALS['a'] . "</p>";
    echo "<p>Valor de \$b: " . $GLOBALS['b'] . "</p>";
    echo "<p>Valor de \$c: " . $GLOBALS['c'] . "</p>";
    echo "<p>Valor de \$z[0]: " . print_r($GLOBALS['z'], true) . "</p>";

    /* Ejercicio 5 */
    echo "<h2>Ejercicio 5</h2>";
    $a = "7 personas";
    echo "<p>Valor de \$a: $a</p>";
    $b = (integer) $a;
    echo "<p>Valor de \$b después de la conversión: $b</p>";
    $a = "9E3";
    echo "<p>Valor de \$a: $a</p>";
    $c = (double) $a;
    echo "<p>Valor de \$c después de la conversión: $c</p>";

    /* Ejercicio 6 */
    echo "<h2>Ejercicio 6</h2>";
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
    echo "<h3>Valor booleano de las variables usando var_dump:</h3>";
    echo "<p>\$a (Valor de '0'): "; var_dump($a); echo "</p>";
    echo "<p>\$b (Valor de 'TRUE'): "; var_dump($b); echo "</p>";
    echo "<p>\$c (Valor de FALSE): "; var_dump($c); echo "</p>";
    echo "<p>\$d (\$a OR \$b): "; var_dump($d); echo "</p>";
    echo "<p>\$e (\$a AND \$c): "; var_dump($e); echo "</p>";
    echo "<p>\$f (\$a XOR \$b): "; var_dump($f); echo "</p>";
    /* Transformación de valores booleanos */
    echo "<h3>Transformación para visualización con echo</h3>";
    echo "<p>Valor de \$c como string: " . ($c ? 'TRUE' : 'FALSE') . "</p>";
    echo "<p>Valor de \$e como string: " . ($e ? 'TRUE' : 'FALSE') . "</p>";

    /* Ejercicio 7 */
    echo "<h2>Ejercicio 7</h2>";
    echo "<p>Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
    echo "<p>Versión de PHP: " . phpversion() . "</p>";
    echo "<p>Sistema operativo del servidor: " . PHP_OS . "</p>";
    echo "<p>Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>";
    ?>

    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
    </p>
</body>
</html>
