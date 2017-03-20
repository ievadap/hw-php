<?php

namespace App\Base\Product;

use App\Base\Base;

class Product extends Base
{
    protected $name;
    protected $price;

    /**
     * Product constructor.
     * @param $name
     * @param $price
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    function __set($name, $value)
    {
        switch ($name) {
            case "name":
                $this->name = $value;
                break;
            case "price":
                $this->price = $value;
                break;
            default:
                error_log("Setting an inaccessible property " . $name);
        }
    }

    function __get($name)
    {
        switch ($name) {
            case "name":
                return $this->name;
            case "price":
                return $this->price;
            default:
                error_log("Getting an inaccessible property " . $name);
        }
    }

    function __isset($name)
    {
        switch ($name) {
            case "name":
                if (isset($this->name)) {
                    error_log("Product's name " . $name . " is set.");
                } else {
                    error_log("Product's name is not set.");
                }
                break;
            case "price":
                if (isset($this->price)) {
                    error_log("Product's price " . $name . " is set.");
                } else {
                    error_log("Product's price is not set.");
                }
                break;
            default:
                error_log("Checking an inaccessible property " . $name);
        }
    }

    function __unset($name)
    {
        switch ($name) {
            case "name":
                unset($this->name);
                error_log("Product's name is unset.");
                break;
            case "price":
                unset($this->price);
                error_log("Product's price is unset.");
                break;
            default:
                error_log("Unsetting an inaccessible property " . $name);
        }
    }

    function __clone()
    {
        $this->name = "item";
    }

    public function __debugInfo()
    {
        return [
            'name' => $this->name,
            'price' => $this->price . '$',
        ];
    }

    public function __sleep()
    {
        return array('name', 'price');
    }

    public function __wakeup()
    {
        error_log("Wakeup");
    }

    function __destruct()
    {
        error_log("The object was destroyed");
    }
}