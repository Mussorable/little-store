<?php

namespace Utilities\ProductTypes;

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

    function getDataArray()
    {
        $data = [
            "sku" => $this->sku,
            "name" => $this->name,
            "price" => $this->price,
            "arg" => $this->height . 'x' . $this->width . 'x' . $this->length,
            "type" => "Furniture"
        ];
        return $data;
    }
}
