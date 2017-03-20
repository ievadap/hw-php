<?php

use App\Base\Cart\Cart;
use App\Base\Cart\Storage\Storage;
use App\Base\Product\Product;

require __DIR__ . '/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homework</title>
</head>
<body>

<?php

// triggers magic __construct() method
$myCart = new Cart();
$mug = new Product('mug', 20);

// triggers magic __toString() method
echo $mug . "<br>";

// triggers magic __isset() method
var_dump(isset($mug));
isset($mug->price);

// triggers magic __unset() method
unset($mug->price);
// triggers magic __debugInfo() method
var_dump($mug);

// triggers magic __set() method
$mug->price = 19;

// triggers magic __get() method
echo $mug->price . "<br>";

$myCart->addProduct($mug);
$myCart->addProduct(new Product('bread', 1));
$myCart->addProduct(new Product('carpet', 60));
$myCart->addProduct(new Product('milk', 2));
$myCart->addProduct(new Product('blouse', 12));
$myCart->viewProducts();
echo "<br>";

$myCart->removeProduct('milk');
$myCart->viewProducts();
echo "<br>";

// triggers magic __destruct() method
$myCart->removeAllProducts();
$myCart->viewProducts();
echo "<br> ";

// triggers magic __invoke() method
$myCart();

// triggers magic __call() method
$mug->someMethod('asdf');

// triggers magic __callStatic() method
Product::someStaticMethod('qwert');

// triggers magic __set_state() method
eval('$cart2 = ' . var_export(new Cart(), true) . ';');
var_dump($cart2);

$mug = new Product('mug', 20);
$tankard = $mug;
// triggers magic __clone() method
$glass = clone $mug;
$mug->name = "shotglass";

var_dump($mug);
var_dump($tankard);
var_dump($glass);

$storage = new Storage();
$cart = new Cart();
$cart->addProduct($mug);
$cart->addProduct($glass);
$cart->viewProducts();
echo "<br>";

// triggers magic __sleep() method
$storage->store($myCart);
echo "<br>";

// triggers magic __wakeup() method
$storage->reloadCart($myCart);
echo "<br>";

?>

</body>
</html>