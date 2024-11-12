<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;

$products = new Products();
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['producto'])) {
    $id = $data['id'];
    $producto = $data['producto'];
    $products->updateProduct($id, $producto);  // Implementa updateProduct en Products
}

echo $products->getData();
?>
