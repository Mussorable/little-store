<?php
require 'Product.php';

class Book extends Product
{
    private $weight;

    function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    function setData($weight, $arg1 = null, $arg2 = null)
    {
        $this->weight = $weight;
    }

    function getData()
    {
        echo $this->sku . '<br>';
        echo $this->name . '<br>';
        echo $this->price . '<br>';

        echo $this->weight . '<br>';
    }
}
