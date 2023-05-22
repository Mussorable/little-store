<?php

require_once 'Utilities/Autoloader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Utilities\ConnectDB;

$database = new ConnectDB();
$database->getProducts();
if ($database->checkDB_Updates()) {
    $database->patchAPI("https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/products.json", ["Content-Type: application/json"]);
    echo "UPDATED";
}
$database->closeConnection();
