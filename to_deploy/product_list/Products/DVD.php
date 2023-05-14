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

    function productWeight()
    {
        echo "productWeight";
    }

    function getData()
    {
        echo $this->sku;
        echo $this->name;
        echo $this->price;
    }
}
