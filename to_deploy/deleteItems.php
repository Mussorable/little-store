<?php

require_once 'Utilities/Autoloader.php';

use Utilities\ConnectDB;


$database = new ConnectDB('localhost', 'products', 'root', 'root');
$database->delProducts();
$database->closeConnection();
