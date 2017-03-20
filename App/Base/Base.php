<?php

namespace App\Base;

class Base
{
    function __toString()
    {
        $vars = [];
        foreach (get_object_vars($this) as $var) {
            if (is_array($var)) {
                $vars[] = implode($var, '; ');
            } else {
                $vars[] = $var;
            }
        }
        return implode($vars, ", ") . "\n";
    }

    function __call($name, $arguments)
    {
        error_log("Called object method " . $name . " with arguments: " . implode(', ', $arguments));
    }

    static function __callStatic($name, $arguments)
    {
        error_log("Called static method " . $name . " with arguments: " . implode(', ', $arguments));
    }

    function __get($name)
    {
        error_log("Getting an inaccessible property " . $name);
    }

    function __set($name, $value)
    {
        error_log("Setting an inaccessible property " . $name);
    }

    function __isset($name)
    {
        error_log("Checking an inaccessible property " . $name);
    }

    function __unset($name)
    {
        error_log("Destroying an inaccessible property " . $name);
    }

    function __invoke()
    {
        error_log("An object was called as a function");
    }
}