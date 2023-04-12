<?php
require_once "Product.php";
require_once "Cart.php";
require_once "CartItem.php";

$product1 = new Product(1, "iPhone 11", 2500, 10);
$product2 = new Product(2, "M2 SSD", 400, 10);
$product3 = new Product(3, "Samsung Galaxy S20", 3200, 10);
$cart = new Cart();
$cartItem1 = $cart->addProduct($product1, 1);

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // This must print 2
$cart->increaseQuantity($cartItem1, 2);
// $cartItem2 = $cart->addProduct($product2, 1);
// echo "Number of items in cart: ".PHP_EOL;
// echo $cart->getTotalQuantity().PHP_EOL; // This must print 2
// echo "Total price of items in cart: ".PHP_EOL;
// echo $cart->getTotalSumPrice().PHP_EOL; // This must print 2900
// $cartItem3 = $cart->addProduct($product2, 2);
// echo "Number of items in cart: ".PHP_EOL;
// echo $cart->getTotalQuantity().PHP_EOL; // This must print 2


echo '<pre>';
echo "Number of items in cart: ".PHP_EOL;
print_r($cart->getTotalQuantity());
echo '</pre>';

echo '<pre>';
echo "Number of items in cart: ".PHP_EOL;
print_r($cart->getTotalSumPrice());
echo '</pre>';

$cart->decreaseQuantity($cartItem1, 3);

echo '<pre>';
echo "Number of items in cart: ".PHP_EOL;
print_r($cart->getTotalQuantity());
echo '</pre>';

echo '<pre>';
echo "Number of items in cart: ".PHP_EOL;
print_r($cart->getTotalSumPrice());
echo '</pre>';
