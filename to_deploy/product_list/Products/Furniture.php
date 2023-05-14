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

    function setData($height, $width, $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    function getData()
    {
        echo $this->sku . '<br>';
        echo $this->name . '<br>';
        echo $this->price . '<br>';

        echo $this->height . '<br>';
        echo $this->width . '<br>';
        echo $this->length . '<br>';
    }
}
