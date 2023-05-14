<?php

require 'product_list/ConnectDB.php';

// set db connect
$database = new ConnectDB('localhost', 'products', 'root', 'root');
$database->setConnection();
$database->getProducts();
$database->closeConnection();
