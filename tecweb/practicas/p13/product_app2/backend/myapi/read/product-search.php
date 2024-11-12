<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;

$products = new Products();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $products->searchProducts($search);  // Implementa searchProducts en Products
}

echo $products->getData();
?>
