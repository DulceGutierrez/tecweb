<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;

$products = new Products();
$products->getAllProducts();  // Implementa getAllProducts en Products

echo $products->getData();
?>
