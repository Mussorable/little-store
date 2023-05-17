<?php

namespace Utilities\ProductTypes;

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

    function getDataArray()
    {
        $data = [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "arg" => $this->weight . 'KG',
            "type" => "Book"
        ];
        return $data;
    }
}
