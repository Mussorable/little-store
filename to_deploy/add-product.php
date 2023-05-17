<?php

require 'Utilities/autoloader.php';

use Utilities\ConnectDB;


// Take the same for all products data and return new Product object
$typeSelect = $_GET['type-select'];
$sku = $_GET['sku'];
$name = $_GET['name'];
$price = $_GET['price'];

function &factory($productType, $sku, $name, $price)
{
    require_once('product_list/Products/' . $productType . '.php');
    if (class_exists($productType)) {
        $class = new $productType($sku, $name, $price);
        return $class;
    }
}

function getTypeClassData($product)
{
    if (get_class($product) == 'Book') {
        $product->setData($_GET['weight']);
    } elseif (get_class($product) == 'DVD') {
        $product->setData($_GET['size']);
    } elseif (get_class($product) == "Furniture") {
        $product->setData($_GET['height'], $_GET['width'], $_GET['length']);
    } else {
        return "Error. Product type nod defined.";
    }
}

$product = factory($typeSelect, $sku, $name, $price);
getTypeClassData($product);
echo $product->getData();

// 
$database = new ConnectDB('localhost', 'products', 'root', 'root');
$database->addProduct($product->getDataArray());
$database->closeConnection();

header('Location: /');
exit;
