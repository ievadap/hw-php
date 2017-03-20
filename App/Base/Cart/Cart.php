<?php

namespace App\Base\Cart;

use App\Base\Base;

class Cart extends Base
{
    protected $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    public function removeProduct($name)
    {
        foreach ($this->products as $key => $product) {
            if ($product->name == $name) {
                unset($this->products[$key]);
                break;
            }
        }
    }

    public function removeAllProducts()
    {
        $this->products = [];
    }

    public function viewProducts()
    {
        echo $this;
    }

    static function __set_state($an_array)
    {
        $obj = new Cart();
        $obj->products = $an_array['products'];
        return $obj;
    }


    function __sleep()
    {
        echo "Thank you come again";
        unset($this->products);
    }

    function __wakeup()
    {
        echo "Welcome back";
    }
}