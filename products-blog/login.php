<?php
session_start();
$headerTitle = "Login";


// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Models/User.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\User\User;
use Lib\ShoppingCart\ShoppingCart;

// LOGIN SESSION
if ($_SESSION["loggedIn"] == true) {
    header("Location:page-not-found.php");
}
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}
// SHOPPING CART (SESSION)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);

// FORM VALIDATION
$systemErrors = [
    "Niste uneli dobre podatke.",
    "Morate uneti mejl",
    "Morate uneti lozinku"
];
if (isset($_POST["login"])) {
    if (!empty(trim($_POST["email-login"])) && !empty(trim($_POST["lozinka-login"]))) {
        $emaillogin = (string) ($_POST["email-login"]);
        $lozinkalogin = (string) ($_POST["lozinka-login"]);
        $hashlozinka = (string) User::GetPassword($emaillogin)["password"];
        if (User::InUsers($emaillogin) && password_verify($lozinkalogin, $hashlozinka)) {
            $_SESSION["loggedIn"] = true;
            $_SESSION["useremail"] = $emaillogin;
            header("Location:profile-page.php");
        }
    }
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-login.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
