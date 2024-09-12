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

function obtenerParqueVehicular() {
    return [
        'ABC1234' => [
            'Auto' => ['marca' => 'Toyota', 'modelo' => 2019, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Juan Pérez', 'ciudad' => 'México, CDMX', 'direccion' => 'Av. Reforma 123']
        ],
        'DEF5678' => [
            'Auto' => ['marca' => 'Honda', 'modelo' => 2018, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Ana López', 'ciudad' => 'Guadalajara, JAL', 'direccion' => 'Calle Falsa 456']
        ],
        // Agregar 13 registros adicionales aquí...
        'GHI9012' => [
            'Auto' => ['marca' => 'Ford', 'modelo' => 2020, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Carlos Ruiz', 'ciudad' => 'Monterrey, NL', 'direccion' => 'Boulevard Norte 789']
        ],
        'JKL3456' => [
            'Auto' => ['marca' => 'Mazda', 'modelo' => 2017, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'María García', 'ciudad' => 'Puebla, PUE', 'direccion' => 'Av. Juárez 101']
        ],
        'MNO7890' => [
            'Auto' => ['marca' => 'Chevrolet', 'modelo' => 2016, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Luis Hernández', 'ciudad' => 'Querétaro, QRO', 'direccion' => 'Calle 1 234']
        ],
        'PQR1234' => [
            'Auto' => ['marca' => 'Nissan', 'modelo' => 2015, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Laura Martínez', 'ciudad' => 'Tijuana, BC', 'direccion' => 'Avenida 2 567']
        ],
        'STU5678' => [
            'Auto' => ['marca' => 'Volkswagen', 'modelo' => 2014, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Fernando Castillo', 'ciudad' => 'Mérida, YUC', 'direccion' => 'Boulevard 3 890']
        ],
        'VWX9012' => [
            'Auto' => ['marca' => 'Kia', 'modelo' => 2013, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Patricia Ramos', 'ciudad' => 'Cancún, QROO', 'direccion' => 'Calle 4 123']
        ],
        'YZA3456' => [
            'Auto' => ['marca' => 'Hyundai', 'modelo' => 2012, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Ricardo Romero', 'ciudad' => 'León, GTO', 'direccion' => 'Avenida 5 456']
        ],
        'BCD7890' => [
            'Auto' => ['marca' => 'BMW', 'modelo' => 2011, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Elena Torres', 'ciudad' => 'Chihuahua, CHIH', 'direccion' => 'Boulevard 6 789']
        ],
        'EFG1234' => [
            'Auto' => ['marca' => 'Audi', 'modelo' => 2010, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Raúl Flores', 'ciudad' => 'San Luis Potosí, SLP', 'direccion' => 'Calle 7 123']
        ],
        'HIJ5678' => [
            'Auto' => ['marca' => 'Mercedes-Benz', 'modelo' => 2009, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Gabriela Méndez', 'ciudad' => 'Villahermosa, TAB', 'direccion' => 'Avenida 8 456']
        ],
        'KLM9012' => [
            'Auto' => ['marca' => 'Jeep', 'modelo' => 2008, 'tipo' => 'sedan'],
            'Propietario' => ['nombre' => 'Jorge Moreno', 'ciudad' => 'Toluca, MEX', 'direccion' => 'Boulevard 9 789']
        ],
        'NOP3456' => [
            'Auto' => ['marca' => 'Renault', 'modelo' => 2007, 'tipo' => 'hatchback'],
            'Propietario' => ['nombre' => 'Verónica Chávez', 'ciudad' => 'Cuernavaca, MOR', 'direccion' => 'Calle 10 123']
        ],
        'QRS7890' => [
            'Auto' => ['marca' => 'Peugeot', 'modelo' => 2006, 'tipo' => 'camioneta'],
            'Propietario' => ['nombre' => 'Eduardo Lara', 'ciudad' => 'Saltillo, COAH', 'direccion' => 'Avenida 11 456']
        ]
    ];
}

function buscarPorMatricula($matricula) {
    $parqueVehicular = obtenerParqueVehicular();
    if (array_key_exists($matricula, $parqueVehicular)) {
        return $parqueVehicular[$matricula];
    } else {
        return false;
    }
}

function obtenerTodosLosAutos() {
    return obtenerParqueVehicular();
}
?>
