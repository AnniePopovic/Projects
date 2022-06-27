<?php
session_start();

$headerTitle = "Create new product";
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

//LOGIN SESSION
if ($_SESSION["loggedIn"] != true) {
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
//BRAND I KATEGORIJA, BARKOD
$products = Product::GetAllProducts();
$brands = [];
foreach ($products as $singleProduct) {
    $brands[] = $singleProduct->brand;
    $brands = array_unique($brands);
}
$categories = [];
foreach ($products as $singleProduct) {
    $categories[] = $singleProduct->category;
    $categories = array_unique($categories);
}
$barcodes = [];
foreach ($products as $singleProduct) {
    $barcodes[] = $singleProduct->barcode;
}

//VALIDACIJA FORME
$systemErrors = [
    "Polje \"Naziv proizvoda\" ne može biti prazno",
    "Polje \"Cena\" ne može biti prazno",
    "Polje \"Cena\" mora biti broj",
    "Nevalidan broj",
    "Polje \"Količina\" ne može biti prazno",
    "Polje \"Količina\" mora biti broj",
    "Polje \"Barkod\" ne može biti prazno",
    "Polje \"Barkod\" mora biti broj",
    "Barkod već postoji u bazi",
    "Morate izabrati ili upisati brend",
    "Morate izabrati ili upisati kategoriju",
    "Polje \"Deskripcija\" ne može biti prazno",
    "Niste postavili sliku"
];

$isValidFlag = false;
if (isset($_POST["kreiraj"])) {
    if ((!empty(trim($_POST["title"]))) &&
        (!empty(trim($_POST["price"])) && is_numeric($_POST["price"]) && $_POST["price"] > 0) &&
        (!empty(trim(($_POST["stock"]))) && is_numeric($_POST["stock"]) && $_POST["stock"] > 0) &&
        (!empty(trim(($_POST["barcode"]))) && is_numeric($_POST["barcode"]) && $_POST["barcode"] > 0 && !in_array($_POST["barcode"], $barcodes)) &&
        (!empty($_POST["brand"]) || !empty(trim($_POST["new-brand"]))) &&
        (!empty($_POST["category"]) || !empty(trim($_POST["new-category"]))) &&
        (!empty($_POST["description"])) &&
        ($_FILES["image"]["error"] !== 4)
    ) {
        $naziv = (string) ucfirst($_POST["title"]);
        $cena = $_POST["price"];
        $stock = $_POST["stock"];
        $barcode = $_POST["barcode"];
        $status = $_POST["status"];
        $brand = !empty($_POST["new-brand"]) ? $_POST["new-brand"] : ucfirst($_POST["brand"]);
        $category = !empty($_POST["new-category"]) ? $_POST["new-category"] : ucfirst($_POST["category"]);
        $description = $_POST["description"];
        $fileName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $imageExtension = explode(".", $fileName);
        $imageExtension = strtolower(end($imageExtension));
        $newImageName = uniqid();
        $newImageName .= "." . $imageExtension;
        $slika = "./public/theme/img/$newImageName";
        $isValidFlag = true;
    }
}
// CREATE PRODUCT
if ($isValidFlag == true) {
    move_uploaded_file($tmpName, "./public/theme/img/" . $newImageName);
    Product::InsertNewProduct($naziv, $cena, $stock, $barcode, $status, $brand, $category, $description, $slika);
    unset($_POST);
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";

// PAGE
require __DIR__ . "/views/v-create-product-page.php";

// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
