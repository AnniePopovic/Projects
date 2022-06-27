<?php
session_start();
$headerTitle = "Thank you";
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;
// SHOPPING CART (SESSION)
if (!isset($_SESSION['thanks'])) {
    $_SESSION['thanks'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['thanks']);
$products = $shoppingCart->getItems();
$ukupno = 0;
//LOGIN SESSION
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}
// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-thank-you-page.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
