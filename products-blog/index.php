<?php
session_start();
$headerTitle = "Shoe Shop";

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

$products = Product::getRandomProducts();

$najprodavaniji = array_slice($products, 0, 3);
$najgledaniji = array_slice($products, 3, 3);


// SHOPPING CART (SESSION)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
//LOGIN SESSION
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-index.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
