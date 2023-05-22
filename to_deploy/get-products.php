<?php

require_once 'Utilities/Autoloader.php';

use Utilities\ConnectDB;

$database = new ConnectDB();
$database->getProducts();
if ($database->checkDB_Updates()) {
    $database->patchAPI("https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/products.json", ["Content-Type: application/json"]);
}
$database->closeConnection();
