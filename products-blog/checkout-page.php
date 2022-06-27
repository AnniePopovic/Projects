<?php
session_start();
$headerTitle = "Check out";
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;
// SHOPPING CART (SESSION)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);
$products = $shoppingCart->getItems();
$ukupno = 0;
if (empty($_SESSION["cart"])) {
    header("Location:products-page.php");
}
//LOGIN SESSION
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

//VALIDACIJA FORME
$systemErrors = [
    "<span style=color:red>Morate uneti ime!</span>",
    "<span style=color:red>Morate uneti prezime!</span>",
    "<span style=color:red>Morate uneti mejl!</span>",
    "<span style=color:red>Mejl mora da sadrži @</span>",
    "<span style=color:red>Upišite vrednost bez razmaka</span>",
    "<span style=color:red>Morate upisati grad!</span>",
    "<span style=color:red>Morate upisati broj!</span>",
    "<span style=color:red>Neispravan broj telefona</span>",
    "<span style=color:red>Morate upisati ulicu!</span>",
    "<span style=color:red>Morate upisati ZIP!</span>",
    "<span style=color:red>Niste čekirali da li se slažete sa pravilima.</span>"
];
$isValidFlag = false;
if (isset($_POST["naruči"])) {

    if ((!empty(trim($_POST["ime"]))) &&
        (!empty(trim($_POST["prezime"]))) &&
        (!empty(trim($_POST["email"]))) &&
        (strpos(trim($_POST["email"]), "@") == true) &&
        (strpos(trim($_POST["email"]), " ") == false) &&
        (!empty(trim($_POST["grad"]))) &&
        (!empty(trim($_POST["telefon"]))) &&
        (is_numeric($_POST["telefon"])) &&
        ((strlen(trim($_POST["telefon"])) > 9 || strlen(trim($_POST["telefon"])) < 11)) &&
        (!empty(trim($_POST["ulica"]))) &&
        (!empty(trim($_POST["zip"]))) &&
        (is_numeric($_POST["zip"])) &&
        (strpos(trim($_POST["zip"]), " ") == false) &&
        (!empty($_POST["ček"]))
    ) {
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $email = $_POST["email"];
        $grad = $_POST["grad"];
        $telefon = $_POST["telefon"];
        $ulica = $_POST["ulica"];
        $zip = $_POST["zip"];
        $komentar = $_POST["komentar"];
        $isValidFlag = true;
    }
}

if ($isValidFlag == true) {
    $_SESSION["thanks"] = $_SESSION["cart"];
    unset($_SESSION["cart"]);
    header("Location: thank-you-page.php");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-checkout.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
