<?php
require('Database.php');
$db = new Database(); //Universal Database Object

require('Products.php');
$products = new Products($db); //Universal Products Object

$allProducts = $products->getProducts(); //All Products in Product Table

require('Cart.php');
$cart = new Cart($db, $products); //Universal Cart Object

require('User.php');
$user = new User($db); //Universal User Object

require('Order.php');
$order = new Order($db, $cart);
?>