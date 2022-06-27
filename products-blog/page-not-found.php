<?php
session_start();
$headerTitle = "Error 404";
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Models/Contact.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Contact\Contact;
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
require __DIR__ . "/views/v-page-not-found.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
