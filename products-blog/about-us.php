<?php
session_start();
$headerTitle = "About Us";

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Lib\ShoppingCart\ShoppingCart;


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
require __DIR__ . "/views/v-about-us.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
