<?php

class AddProduct
{
    private $sku = 'sku';
    private $name;
    private $price;

    private $productType;

    function printHello()
    {
        echo $this->sku;
    }
}
