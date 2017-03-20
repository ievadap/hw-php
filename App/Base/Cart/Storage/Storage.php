<?php

namespace App\Base\Cart\Storage;

class Storage
{
    public $storedProducts;

    /**
     * @param $cart
     */
    function store($cart)
    {
        $this->storedProducts = serialize($cart);
    }

    /**
     * @param $cart
     */
    function reloadCart(&$cart)
    {
        $cart->products = unserialize($this->storedProducts);
        unset($this->storedProducts);
        $cart->__wakeup();
    }
}