<?php
session_start();
$headerTitle = "Vaša korpa";

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

//LOGIN SESSION
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}
// SHOPPING CART (SESSION)

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
if (empty($_SESSION["cart"])) {
    header("Location:products-page.php");
}
// BRISANJE VIŠE PROIZVODA
if (isset($_POST["obriši"])) {
    if (!empty($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $productId) {
            $shoppingCart->removeProduct(Product::getOneProductById($productId));
            $shoppingCart->updateSession();
        }
    }
    if (empty($_SESSION['cart'])) {
        header("Location: ./products-page.php");
    }
}
// BRISANJE SAMO JEDNOG
if (isset($_POST["close"])) {
    $shoppingCart->removeProduct(Product::getOneProductById($_POST["close"]));
    $shoppingCart->updateSession();
    if (empty($_SESSION['cart'])) {
        header("Location: ./products-page.php");
    }
}
// MENJANJE KOLIČINE
//DODAVANJE
if (isset($_POST["+"])) {
    foreach ($shoppingCart->getItems() as $singleProduct)
        if ($singleProduct->getProduct()->id == $_POST["+"]) {
            $singleProduct->addOneMore();
            $shoppingCart->updateSession();
        }
}
//ODUZIMANJE
if (isset($_POST["-"])) {
    foreach ($shoppingCart->getItems() as $singleProduct)
        if ($singleProduct->getProduct()->id == $_POST["-"]) {
            $singleProduct->SubtractOneMore();
            $shoppingCart->updateSession();
        }
}
$products = $shoppingCart->getItems();
$ukupno = 0;


// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-shopping-cart-page.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
