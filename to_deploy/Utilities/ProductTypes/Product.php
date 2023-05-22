<?php

namespace Utilities\ProductTypes;

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    abstract protected function setData($arg0, $arg1, $arg2);
    abstract protected function getDataArray();
}
