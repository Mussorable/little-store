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

    function __construct()
    {
        $this->servername = 'localhost';
        $this->database = 'products';
        $this->username = 'root';
        $this->password = 'root';

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

        $this->setToUpdate();
    }

    final private function getResponse($response)
    {
        $data = [];
        if ($response) {
            while ($row = mysqli_fetch_assoc($response)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    function checkDB_Updates()
    {
        $query =
            "
            SELECT value FROM settings
            WHERE parameter = 'to_update';
            ";

        $response = mysqli_query($this->mysqli, $query);
        $data = $this->getResponse($response);
        $isUpdateAPI = $data[0]["value"];

        return $isUpdateAPI;
    }

    final private function setToUpdate()
    {
        $query =
            "
                UPDATE settings
                SET value = true
                WHERE parameter = 'to_update';
            ";

        mysqli_query($this->mysqli, $query);
    }

    final private function setUpdated()
    {
        $query =
            "
                UPDATE settings
                SET value = false
                WHERE parameter = 'to_update';
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

        if ($response) {
            $data = $this->getResponse($response);
            $this->jsonData = json_encode($data);
        }
    }

    function delProducts()
    {
        $this->setToUpdate();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataArray = json_decode(file_get_contents('php://input'), true);

            if (isset($dataArray['data']) && is_array($dataArray['data'])) {
                $receivedArray = $dataArray['data'];
                foreach ($receivedArray as $index => $value) {
                    mysqli_query(
                        $this->mysqli,
                        "
                    DELETE FROM products
                    WHERE id = {$value};  
                    "
                    );
                }
            }
        }
    }

    function patchAPI($endpoint, $header)
    {
        $connection = curl_init($endpoint);
        $this->jsonData . "<br>";
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($connection, CURLOPT_POSTFIELDS, $this->jsonData);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connection);
        curl_close($connection);

        if ($response) {
            $this->setUpdated();
        }
    }

    function closeConnection()
    {
        $this->mysqli->close();
    }
}
