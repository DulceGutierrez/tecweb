<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejemplo 6</title>
    </head>
    <body>
        <?php
        require_once __DIR__. '/Opcion.php';
        require_once __DIR__. '/Menu.php';

        $menu1 = new menu ('horizontal');
        
        $opc1 = new opcion('facebook','https://www.facebook.com','#C3D9FF');
        $menu1 ->insertar_opcion($opc1);

        $opc1 = new opcion('outlook','https://www.outlook.com','#CDEBBB');
        $menu1 ->insertar_opcion($opc2);

        $opc1 = new opcion('instagram','https://www.instagram.com','#FFD9C3');
        $menu1 ->insertar_opcion($opc3);

        $menu1 ->graficar();
        ?>
    </body>
</html>