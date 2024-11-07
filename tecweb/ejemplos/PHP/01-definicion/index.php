<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejemplo 1</title>
</head>
<body>
    <?php 
    require_once __DIR__. '/persona.php';

    $per1 = new persona;
    $per1->inicializar('Pedro');
    $per1->mostrar();

    $per2 = new persona;
    $per2->inicializar('Gera');
    $per2->mostrar();
    ?>
</body>
</html>