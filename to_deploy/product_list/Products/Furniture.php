<?php
require 'Product.php';

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

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
