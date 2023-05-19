<?php


namespace Utilities;

use Utilities\ProductTypes;

class DataConverter
{
    public static function getProductClass($productType, $sku, $name, $price)
    {
        if (class_exists(ProductTypes::class . '\\' . $productType)) {
            $className = ProductTypes::class . '\\' . $productType;
            $class = new $className($sku, $name, $price);

            $obj = new self();
            $obj->getTypeClassData($class);

            return $class;
        }
    }

    private function getTypeClassData($product)
    {
        if ($product instanceof ProductTypes\Book) {
            $product->setData($_GET['weight']);
        } elseif ($product instanceof ProductTypes\DVD) {
            $product->setData($_GET['size']);
        } elseif ($product instanceof ProductTypes\Furniture) {
            $product->setData($_GET['height'], $_GET['width'], $_GET['length']);
        } else {
            return "Error. Product type nod defined.";
        }
    }
}
