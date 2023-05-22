<?php

require_once 'Utilities/Autoloader.php';

use Utilities\ConnectDB;


$database = new ConnectDB();
$database->delProducts();
$database->closeConnection();
