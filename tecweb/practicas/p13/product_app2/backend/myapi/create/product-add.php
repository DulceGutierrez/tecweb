<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;

$products = new Products();
$producto = file_get_contents('php://input');
$jsonOBJ = json_decode($producto, true);

if (!empty($jsonOBJ)) {
    $products->addProduct($jsonOBJ);  // Asegúrate de que `addProduct` esté implementado en Products
}

echo $products->getData();
?>


<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../vendor/autoload.php";  // Asegúrate de cargar el autoloader desde el directorio correcto

use TECWEB\MYAPI\Products;  // Importa la clase Products
