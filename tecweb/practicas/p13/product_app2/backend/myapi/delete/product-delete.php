<?php
namespace TECWEB\MYAPI;

require_once __DIR__ . "/../../../vendor/autoload.php";
use TECWEB\MYAPI\Products;


$products = new Products();

if (isset($_POST['id'])) {
    $id = $_POST['id'];  // Recibe el ID a través de POST
    $products->deleteProduct($id);  // Implementa deleteProduct en Products
}

echo $products->getData();
?>
