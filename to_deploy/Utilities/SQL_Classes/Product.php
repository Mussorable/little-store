<?php

namespace Utilities\SQL_Classes;

class Product
{
    public $sku;
    public $name;
    public $price;
    public $arg;
    public $type;
    public $id;

    function getProduct()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'arg' => $this->arg,
            'type' => $this->type
        ];
    }
}
