<?php
session_start();
$headerTitle = "Pogledaj proizvod";
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
$id = $_GET["page"];
try {
    // GET ONE PRODUCT AND RELATED
    if (!empty($id)) {
        $singleProduct = Product::getOneProductById($id);
        $iskategorisaniniz = $singleProduct->getRelatedByCategory($id);

        $kategorije = "";
        if ($iskategorisaniniz >= 2) {
            shuffle($iskategorisaniniz);
            $kategorije = array_slice($iskategorisaniniz, 0, 3);
        } else {
            $kategorije = $singleProduct->getRelatedByCategory($id);
        }
    }
    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST["poruči"]) && isset($_POST['id_proizvoda']) && !empty($_POST['id_proizvoda'])) {
        if (isset($_POST['količina'])) {
            $idproizvoda = $_POST["id_proizvoda"];
            $količina = $_POST["količina"];
            $shoppingCart->addToCart(Product::getOneProductById($idproizvoda), $količina);
            $shoppingCart->updateSession();
        }
    }
} catch (\Throwable $th) {
    header("Location:page-not-found.php");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-single-page.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
