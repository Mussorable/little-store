<?php

require 'product_list/ConnectDB.php';


$database = new ConnectDB('localhost', 'products', 'root', 'root');
$database->setConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataArray = json_decode(file_get_contents('php://input'), true);

    if (isset($dataArray['data']) && is_array($dataArray['data'])) {
        $receivedArray = $dataArray['data'];
        foreach ($receivedArray as $index => $value) {
            echo $database->delProducts($value);
        }
    }
}
