<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);

spl_autoload_register(function ($class) {
    $file = ROOT . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    } else {
        $new = str_replace('.php', '/', $file) . $class . '.php';
        if (file_exists($new)) {
            require_once($new);
        }
    }
});