<?php
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    abstract protected function setData($arg0, $arg1, $arg2);
    abstract protected function getData();
    abstract protected function getDataArray();
}
