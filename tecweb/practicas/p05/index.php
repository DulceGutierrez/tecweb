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
echo "Ejercicio 2<br>";
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
Por lo tanto, cualquier cambio en \$a se refleja en \$b, pero \$c mantiene el valor anterior porque era una referencia al valor antiguo de \$a.<br>";
?>