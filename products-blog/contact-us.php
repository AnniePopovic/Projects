<?php
session_start();

$headerTitle = "Contact us";
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
// FORM VALIDATION
$systemErrors = ["Morate upisati ime", "Morate upisati prezime", "Morate upisati e-mail", "Mejl mora da sadrži @", "Poruka je prazna"];
$isValidFlag = false;
if (isset($_POST["upit"])) {

    if ((!empty(trim($_POST["ime-kontakta"]))) &&
        (!empty(trim($_POST["prezime-kontakta"]))) &&
        (!empty(trim($_POST["email-kontakta"]))) &&
        (strpos(trim($_POST["email-kontakta"]), "@") == true) &&
        (!empty(trim($_POST["poruka-kontakta"])))
    ) {
        $ime = (string) $_POST["ime-kontakta"];
        $prezime = (string)$_POST["prezime-kontakta"];
        $email = (string) $_POST["email-kontakta"];
        $poruka = (string) $_POST["poruka-kontakta"];
        $isValidFlag = true;
    }
}
// INSERT INTO BASE
if ($isValidFlag == true) {
    $kontakt = new Contact($ime, $prezime, $email, $poruka);
    $kontakt->insertContact();
}
// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-contact-us.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
