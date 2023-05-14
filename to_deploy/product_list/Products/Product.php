<?php
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    abstract protected function productWeight();
    abstract protected function getData();
}
