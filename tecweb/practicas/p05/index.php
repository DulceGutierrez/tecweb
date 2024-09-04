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

?>