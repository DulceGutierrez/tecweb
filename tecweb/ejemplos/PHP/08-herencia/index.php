<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <?php
        require_once __DIR__. '/Operacion.php';

        $suma = new Suma;
        $suma ->setValor1(10); //Metodo heredado, pero definido en la clase 'Operacion'
        $suma ->setValor2(10);
        $suma ->operar();
        
        echo 'El resultado es: '.$suma->getResultado().'<br>';


        $suma = new Resta;
        $suma ->setValor1(10); //Metodo heredado, pero definido en la clase 'Operacion'
        $suma ->setValor2(10);
        $suma ->operar();
        
        echo 'El resultado es: '.$resta->getResultado().'<br>';

    ?>
</body>
</html>