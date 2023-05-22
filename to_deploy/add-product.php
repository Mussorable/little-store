<?php

require_once 'Utilities/Autoloader.php';

use Utilities\DataConverter;
use Utilities\ConnectDB;

// 
$database = new ConnectDB();

$productType = DataConverter::getProductClass($_GET['type-select'], $_GET['sku'], $_GET['name'], $_GET['price']);

$database->addProduct($productType->getDataArray());
$database->closeConnection();

header('Location: /');
exit;
