<?php
session_start();
$headerTitle = "Register";
if ($_SESSION["loggedIn"] == true) {
    header("Location:profile-page.php");
}
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Models/User.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\User\User;
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
//FORM VALIDATION
$systemErrors = [
    "Morate upisati ime",
    "Morate upisati prezime",
    "Morate upisati mejl",
    "Mejl mora da sadrži @",
    "Morate upisati lozinku",
    "Lozinka treba da sadrži najmanje 8 karaktera, jedno veliko, jedno malo slovo i jedan specijalni karakter",
    "Morate ponovo uneti lozinku",
    "Lozinke se ne podudaraju",
    "Morate upisati godine",
    "Niste upisali validan broj godina",
    "Morate obeležiti pol"
];
$isValidFlag = false;
if (isset($_POST["register"])) {
    if ((!empty(trim($_POST["ime-usera"]))) &&
        (!empty(trim($_POST["prezime-usera"]))) &&
        (!empty(trim($_POST["email-usera"]))) &&
        (strpos(trim($_POST["email-usera"]), "@") == true) &&
        (!empty($_POST["lozinka-usera"])) &&
        (strlen($_POST["lozinka-usera"]) > 7 && preg_match("@[A-Z]@", $_POST["lozinka-usera"]) && preg_match("@[a-z]@", $_POST["lozinka-usera"]) && preg_match("@[0-9]@", $_POST["lozinka-usera"]) && preg_match("@[^\w]@", $_POST["lozinka-usera"])) &
        (!empty($_POST["ponovi-lozinku-usera"])) &&
        ($_POST["ponovi-lozinku-usera"] == $_POST["lozinka-usera"]) &&
        (!empty($_POST["godine-usera"])) &&
        (is_numeric($_POST["godine-usera"]) && $_POST["godine-usera"] > 0) &&
        (!empty($_POST["pol-usera"]))
    ) {
        $ime = (string) ucfirst($_POST["ime-usera"]);
        $prezime = (string) ucfirst($_POST["prezime-usera"]);
        $email = (string) $_POST["email-usera"];
        $lozinka = $_POST["lozinka-usera"];
        $godine = $_POST["godine-usera"];
        $pol = $_POST["pol-usera"];
        $isValidFlag = true;
    }
}
$userexists = false;
//INSERT INTO BASE
if ($isValidFlag == true) {
    $user = new User($ime, $prezime, $email, $lozinka, $godine, $pol);
    if ($user->UserExists() == false) {
        $user->insertUser();
        header("Location:login.php");
    } else {
        unset($user);
        $userexists = true;
    }
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-register.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
