<?php
class ConnectDB
{
    private $servername;
    private $database;
    private $username;
    private $password;

    private $mysqli;

    function __construct($servername, $database, $username, $password)
    {
        $this->servername = $servername;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    function setConnection()
    {
        $this->mysqli = @new mysqli(
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

        echo 'Success: A proper connection to MySQL was made.<br>';
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

        // $query =
        //     "
        //     INSERT INTO products
        //     VALUES (
        //         DEFAULT,
        //         '01234',
        //         'HARRY POTTER',
        //         20.00,
        //         '1.2'
        //     )
        //     ";

        mysqli_query($this->mysqli, $query);
        echo "data has been added<br>";
        echo "this is {$data["sku"]}<br>";
    }

    function closeConnection()
    {
        $this->mysqli->close();
        echo "connection closed.";
    }
}
