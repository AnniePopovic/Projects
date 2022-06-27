<?php
session_start();

$headerTitle = "Profile";
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Models/User.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\User\User;
use Lib\ShoppingCart\ShoppingCart;

//LOGIN SESSION
if (!isset($_SESSION["loggedIn"])) {
    header("Location:page-not-found.php");
}
// SHOPPING CART (SESSION)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$shoppingCart = new ShoppingCart($_SESSION['cart']);


if (!isset($_SESSION['useremail'])) {
    $_SESSION['useremail'] = "";
}
//PRIKAZ KORISNIKA
$user = User::GetUserByEmail($_SESSION["useremail"]);

//VALIDACIJA FORME
$systemErrors = [
    "Morate upisati ime",
    "Morate upisati prezime",
    "Morate upisati lozinku",
    "Lozinka treba da sadrži najmanje 8 karaktera, jedno veliko, jedno malo slovo i jedan specijalni karakter",
    "Morate upisati godine",
    "Niste upisali validan broj godina",
    "Morate upisati lozinku dva puta",
    "Lozinke se ne poklapaju"
];

$isValidFlag = false;
if (isset($_POST["save"])) {
    if ((!empty(trim($_POST["ime-update"]))) &&
        (!empty(trim($_POST["prezime-update"]))) &&
        (!empty($_POST["godine-update"])) &&
        (is_numeric($_POST["godine-update"]) && $_POST["godine-update"] > 0) &&
        (!empty($_POST["pol-update"]))
    ) {
        $ime = (string) ucfirst($_POST["ime-update"]);
        $prezime = (string) ucfirst($_POST["prezime-update"]);
        $godine = $_POST["godine-update"];
        $pol = $_POST["pol-update"];
        $isValidFlag = true;
    }
}

//PROFILE PHOTO
if (isset($_POST["save"])) {
    if ($_FILES["image"]["error"] !== 4) {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $imageExtension = explode(".", $fileName);
        $imageExtension = strtolower(end($imageExtension));
        $newImageName = uniqid();
        $newImageName .= "." . $imageExtension;
        move_uploaded_file($tmpName, "./public/theme/img/" . $newImageName);
        User::InsertImageByEmail($_SESSION["useremail"], $newImageName);
        $isValidFlag = true;
    }
}
//UPDATE USER
if ($isValidFlag == true) {
    $user = User::UpdateUserByEmail($_SESSION["useremail"], $ime, $prezime, $godine, $pol);
    $user = User::GetUserByEmail($_SESSION["useremail"]);
}

// PASSWORD CHANGE
if (isset($_POST["sačuvaj-lozinku"])) {
    if (!empty($_POST["lozinka-update"])) {
        if ((strlen($_POST["lozinka-update"]) > 7 && preg_match("@[A-Z]@", $_POST["lozinka-update"]) && preg_match("@[a-z]@", $_POST["lozinka-update"]) && preg_match("@[0-9]@", $_POST["lozinka-update"]) && preg_match("@[^\w]@", $_POST["lozinka-update"])) &&
            (!empty($_POST["ponovi-lozinku-update"])) &&
            ($_POST["ponovi-lozinku-update"] == $_POST["lozinka-update"])
        ) {
            $novalozinka = $_POST["lozinka-update"];
            User::ChangePasswordByEmail($_SESSION["useremail"], $novalozinka);
            $isValidFlag = true;
        }
    }
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-profile-page.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
