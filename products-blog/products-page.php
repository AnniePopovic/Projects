<?php
session_start();
$headerTitle = "Proizvodi";

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

// GET PRODUCTS
$products = Product::getAvailableProducts();
$brojproizvoda = count($products);

// PAGINATION
$limit = 6;
$brojstranica = ceil($brojproizvoda / $limit);
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start = ($page - 1) * $limit;
$products = Product::getPagProduct($start, $limit);
$prethodna = ($page == 1) ? 1 : $page - 1;
$sledeća = ($page == $brojstranica) ? $brojstranica : $page + 1;

// TERM AND SORT
$term = "";
$sortBy = "";
if (!empty($_GET['pretraga'])) {
    $term = $_GET['pretraga'];
    $products = Product::searchProductsbyTerm($term);
}
if (!empty($_GET['sortiranje'])) {
    $sortBy = $_GET['sortiranje'];
    $products = Product::sortProductBy($sortBy);
}
// SHOPPING CART (SESSION)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $idproizvoda = $_POST["product_id"];
    $shoppingCart->addToCart(Product::getOneProductById($idproizvoda));
    $shoppingCart->updateSession();
}
//LOGIN SESSION
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}
unset($_SESSION["thanks"]);
// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-products.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
