<?php
require 'Product.php';

class DVD extends Product
{
    private $size;

    function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    function setData($size, $arg1 = null, $arg2 = null)
    {
        $this->size = $size;
    }

    function getDataArray()
    {
        $data = [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "arg" => $this->size . ' MB',
            "type" => 'DVD'
        ];
        return $data;
    }

    function getData()
    {
        echo $this->sku;
        echo $this->name;
        echo $this->price;

        echo $this->size . '<br>';
    }
}
