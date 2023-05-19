<?php

require_once 'Utilities/Autoloader.php';

use Utilities\ConnectDB;

// set db connect
$database = new ConnectDB('localhost', 'products', 'root', 'root');
$database->getProducts();
$headers = array(
    "Content-Type: application/json"
);
$database->patch("https://pet-hotel-375a8-default-rtdb.europe-west1.firebasedatabase.app/products/-NVVhgZuIOy2GK5mQ_DW.json", $headers);
$database->closeConnection();
