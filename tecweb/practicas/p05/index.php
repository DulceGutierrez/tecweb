<?php
/* Ejercicio 1 */
echo "Ejercicio 1<br>";
echo "La variable \$_myvar es válida porque comienza con un guion bajo y un carácter válido.<br>";
echo "La variable \$_7var es válida porque comienza con un guion bajo y un número.<br>";
echo "La variable myvar NO es válida porque no comienza con un signo de dólar.<br>";
echo "La variable \$myvar es válida porque comienza con un signo de dólar seguido de un nombre válido.<br>";
echo "La variable \$var7 es válida porque comienza con un signo de dólar seguido de un nombre válido.<br>";
echo "La variable \$_element1 es válida porque comienza con un guion bajo seguido de un nombre válido.<br>";
echo "La variable \$house*5 NO es válida porque contiene un carácter no permitido (*).<br>";


/* Ejercicio 2*/
echo "<br>Ejercicio 2<br>";
/*Primeras asignaciones*/
echo "<br> Primera asignación<br>";
$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;
echo "Valor de \$a: $a<br>";
echo "Valor de \$b: $b<br>";
echo "Valor de \$c: $c<br>";
/*Segunda asignación*/
echo "<br> Segunda asignación<br>";
$a = "PHP server";
$b = &$a;
echo "Valor de \$a: $a<br>";
echo "Valor de \$b: $b<br>";
echo "Valor de \$c: $c<br>";

echo "<br>¿Qué ocurrió?<br>";
echo "Al asignar \$b = &\$a, \$b se convierte en una referencia a \$a.
Por lo tanto, cualquier cambio en \$a se refleja en \$b y en \$c porque son referencias al valor de \$a.<br>";

/*Ejercicio 3*/
echo "<br>Ejercicio 3<br>";
$a = "PHP5";
$z[] = &$a;
$b = "5a version de PHP";
echo "Valor de \$a después de asignación: $a<br>";
echo "Valor de \$z[0]: " . print_r($z, true) . "<br>";
echo "Valor de \$b: $b<br>";
$c = (int)$b * 10;
echo "Valor de \$c: $c<br>";
$a .= $b;
$b *= $c;
$z[0] = "MySQL";
echo "Después de todas las asignaciones:<br>";
echo "Valor de \$a: $a<br>";
echo "Valor de \$b: $b<br>";
echo "Valor de \$c: $c<br>";
echo "Valor de \$z[0]: " . print_r($z, true) . "<br>";

/*Ejercicio 4*/
echo "<br>Ejercicio 4<br>";
/*Uso de global*/
global $a, $b, $c, $z;
echo "Usando global:<br>";
echo "Valor de \$a: $a<br>";
echo "Valor de \$b: $b<br>";
echo "Valor de \$c: $c<br>";
echo "Valor de \$z[0]: " . print_r($z, true) . "<br>";
/* Uso de $GLOBALS*/
echo "Usando \$GLOBALS:<br>";
echo "Valor de \$a: " . $GLOBALS['a'] . "<br>";
echo "Valor de \$b: " . $GLOBALS['b'] . "<br>";
echo "Valor de \$c: " . $GLOBALS['c'] . "<br>";
echo "Valor de \$z[0]: " . print_r($GLOBALS['z'], true) . "<br>";

/*Ejercicio 5*/
echo "<br>Ejercicio 5<br>";
$a = "7 personas";
echo "Valor de \$a: $a<br>";
$b = (integer) $a;
echo "Valor de \$b después de la conversión: $b<br>";
$a = "9E3";
echo "Valor de \$a: $a<br>";
$c = (double) $a;
echo "Valor de \$c después de la conversión: $c<br>";

/*Ejercicio 6*/
echo "<br>Ejercicio 6<br>";
$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);
echo "Valor booleano de las variables usando var_dump:<br>";
echo "\$a (Valor de '0').........."; var_dump($a); echo "<br>";
echo "\$b (Valor de 'TRUE').."; var_dump($b); echo "<br>";
echo "\$c (Valor de FALSE).."; var_dump($c); echo "<br>";
echo "\$d (\$a OR \$b)............."; var_dump($d); echo "<br>";
echo "\$e (\$a AND \$c).........."; var_dump($e); echo "<br>";
echo "\$f (\$a XOR \$b).........."; var_dump($f); echo "<br>";
/*Transformación de valores booleanos*/
echo "Transformación para visualización con echo<br>";
echo "Valor de \$c como string: " . ($c ? 'TRUE' : 'FALSE') . "<br>";
echo "Valor de \$e como string: " . ($e ? 'TRUE' : 'FALSE') . "<br>";

/*Ejercicio 7*/
echo "<br>Ejercicio 7<br>";
echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Versión de PHP: " . phpversion() . "<br>";
echo "Sistema operativo del servidor: " . PHP_OS . "<br>";
echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";

?>