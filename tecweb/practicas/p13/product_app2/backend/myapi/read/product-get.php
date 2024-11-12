<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;

$products = new Products();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products->getProductById($id);  // Implementa getProductById en Products
}

echo $products->getData();
?>
