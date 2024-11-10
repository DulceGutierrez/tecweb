<?php
// Incluye el archivo de autoload si estás usando Composer
require_once __DIR__ . '/vendor/autoload.php';

// Incluye el archivo product-add.php
require_once __DIR__ . '/backend/Create/product-add.php';

// Usa el namespace correcto para la clase Products
use TECWEB\MYAPI\Products;

// Tu lógica aquí
$productos = new Products('marketzone');
$productos->add(json_decode(json_encode($_POST)));
echo $productos->getData();
