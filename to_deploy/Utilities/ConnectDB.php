<?php

namespace Utilities;

class ConnectDB
{
    private $servername;
    private $database;
    private $username;
    private $password;

    private $mysqli;

    private $jsonData;

    function __construct($servername, $database, $username, $password)
    {
        $this->servername = $servername;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;

        $this->setConnection();
    }

    private function setConnection()
    {
        $this->mysqli = @new \mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->mysqli->connect_error) {
            echo 'Errno: ' . $this->mysqli->connect_errno;
            echo '<br>';
            echo 'Error: ' . $this->mysqli->connect_error;
            exit();
        }
    }

    function addProduct($data)
    {
        $query =
            "
            INSERT INTO products
            VALUES (
                DEFAULT,
                '{$data["sku"]}',
                '{$data["name"]}',
                '{$data["price"]}',
                '{$data["arg"]}',
                '{$data["type"]}'
            )
             ";

        mysqli_query($this->mysqli, $query);
    }

    function getProducts()
    {
        $query =
            "
            SELECT * FROM products
        ";

        $response = mysqli_query($this->mysqli, $query);

        $products = [];
        if ($response) {
            while ($row = mysqli_fetch_assoc($response)) {
                $products[] = $row;
            }
            $this->jsonData = json_encode($products);
        }
    }

    function delProducts($id)
    {
        $query =
            "
            DELETE FROM products
            WHERE id = {$id}; 
            ";
        mysqli_query($this->mysqli, $query);
    }

    function post($endpoint, $header)
    {
        $connection = curl_init($endpoint);
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($connection, CURLOPT_POSTFIELDS, $this->jsonData);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connection);
        curl_close($connection);
    }

    function patch($endpoint, $header)
    {
        $connection = curl_init($endpoint);
        $this->jsonData . "<br>";
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($connection, CURLOPT_POSTFIELDS, $this->jsonData);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connection);
        curl_close($connection);
    }

    function closeConnection()
    {
        $this->mysqli->close();
    }
}
