<?php

namespace Utilities;

class DataConverter
{
    private $productType;
    private $sku;
    private $name;
    private $price;

    function __construct($productType, $sku, $name, $price)
    {
        $this->productType = $productType;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    final public function factory()
    {
        // 
        require_once('product_list/Products/' . $productType . '.php');
        if (class_exists($productType)) {
            $class = new $productType($sku, $name, $price);
            return $class;
        }
    }
}
