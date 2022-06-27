<?php

define("ORDER_BY_PRICE_ASC", "ceni-rastuće");
define("ORDER_BY_PRICE_DSC", "ceni-opadajuće");

/**
 * Function return all news.
 * @return array
 */
function getAllProducts($sort = "")
{
    $products = [
        [
            "id" => 1,
            "title" => "Nike Patike 1",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela1.png",
            "price" => 12000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 2,
            "title" => "Nike Patike 2",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela2.png",
            "price" => 14000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 3,
            "title" => "Nike Patike 3",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela3.jpg",
            "price" => 10000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => false
        ],
        [
            "id" => 4,
            "title" => "Nike Patike 4",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela4.png",
            "price" => 13000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => false
        ],
        [
            "id" => 5,
            "title" => "Nike Patike 5",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela5.jpg",
            "price" => 12000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 6,
            "title" => "Nike Patike 6",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela6.png",
            "price" => 11000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => false
        ],
        [
            "id" => 7,
            "title" => "Nike Patike 7",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela7.jpg",
            "price" => 12000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 8,
            "title" => "Nike Patike 8",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela8.png",
            "price" => 12000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 9,
            "title" => "Nike Patike 9",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela9.jpg",
            "price" => 15000,
            "category" => "Letnja obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 10,
            "title" => "Nike Patike 10",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela10.jpg",
            "price" => 10000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 11,
            "title" => "Jordan Patike 11",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela11.jpg",
            "price" => 18000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => false
        ],
        [
            "id" => 12,
            "title" => "Jordan Patike 12",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela12.jpg",
            "price" => 19000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => true
        ],
        [
            "id" => 13,
            "title" => "Reebook Patike 13",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela13.jpg",
            "price" => 13000,
            "category" => "Zimska obuća",
            "brand" => "Rebook",
            "available" => true
        ],
        [
            "id" => 14,
            "title" => "Reebook Patike 14",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela14.jpg",
            "price" => 14000,
            "category" => "Zimska obuća",
            "brand" => "Rebook",
            "available" => true
        ],
        [
            "id" => 15,
            "title" => "Nike Patike 15",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela15.jpg",
            "price" => 16000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 16,
            "title" => "Nike Patike 16",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela16.jpg",
            "price" => 12000,
            "category" => "Zimska obuća",
            "brand" => "Nike",
            "available" => true
        ],
        [
            "id" => 17,
            "title" => "Jordan Patike 17",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela17.jpg",
            "price" => 14000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => false
        ],
        [
            "id" => 18,
            "title" => "Jordan Patike 18",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela18.jpg",
            "price" => 19000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => true
        ],
        [
            "id" => 19,
            "title" => "Jordan Patike 19",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela19.jpg",
            "price" => 19000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => true
        ],
        [
            "id" => 20,
            "title" => "Jordan Patike 20",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela20.jpg",
            "price" => 20000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => true
        ],
        [
            "id" => 21,
            "title" => "Jordan Patike 21",
            "description" => "Dizajnirane za sve vrste treninga, ove patike vam donose obilje komfora i podrške tokom vežbanja. Ove patike imaju ravnu,stabilnu petu, fleksibilan deo na prstima i sigurnu bočnu podršku. Visoko prianjajuća svojstva omogućavaju vam kretanje po svim podlogama u teretani i zatvorenom prostoru.",
            "img" => "./public/theme/img/cipela21.jpg",
            "price" => 18000,
            "category" => "Zimska obuća",
            "brand" => "Jordan",
            "available" => false
        ]
    ];

    foreach ($products as $key => $singleProduct) {
        if ($singleProduct["available"] == true) {
            $availableproducts[] = $singleProduct;
        }
    }
    $products = $availableproducts;
    if (!empty($_GET["sortiranje"])) {
        if ($_GET["sortiranje"] == ORDER_BY_PRICE_ASC) {
            foreach ($products as $key => $singleProduct) {
                $nizcena[] = $singleProduct["price"];
                asort($nizcena);
            }
            foreach ($nizcena as $k => $v) {
                $sortiraniniz[] = $products[$k];
            }
            return $sortiraniniz;
        } else if ($_GET["sortiranje"] == ORDER_BY_PRICE_DSC) {
            foreach ($products as $key => $singleProduct) {
                $nizcena[] = $singleProduct["price"];
                arsort($nizcena);
            }
            foreach ($nizcena as $k => $v) {
                $sortiraniniz[] = $products[$k];
            }
            return $sortiraniniz;
        }
    } else return $products;
}
function searchProductsbyTerm($term = "")
{
    $products = getAllProducts();
    if (!empty($_GET["pretraga"])) {
        $term = $_GET["pretraga"];
        foreach ($products as $key => $singleProduct) {
            if (
                $term == $singleProduct["title"] ||
                $term == $singleProduct["brand"] ||
                $term == $singleProduct["description"] ||
                stripos($singleProduct["title"], $term) !== FALSE ||
                stripos($singleProduct["brand"], $term) !== FALSE ||
                stripos($singleProduct["description"], $term) !== FALSE
            ) {
                $filtriraniniz[] = $singleProduct;
            }
        }
        return $filtriraniniz;
    }
}
/**
 * Funkcija vraca jedan proizvod po ID
 * 
 * @param integer $id
 * @return mixed 
 */
function getOneProductById($id)
{
    $products = getAllProducts();
    foreach ($products as $key => $singleProduct) {
        if ($singleProduct["id"] == $id) {
            return $singleProduct;
        }
    }
}
/** 
 * Funkcija vraća sledeću stranicu i prvu nakon poslednje
 * @return integer
 */
function getNextProduct($currentId)
{
    $products = getAllProducts();
    foreach ($products as $key => $singleProduct) {
        $trenutniključ = array_search($currentId, array_column($products, "id"));
        if ($trenutniključ < count($products) - 1 || $trenutniključ == $products[0]) {
            $sledeća = $products[$trenutniključ + 1]["id"];
        } else {
            $sledeća = $products[0]["id"];
        }
    }
    return $sledeća;
}

/** 
 * Funkcija vraća prethodnu stranicu i poslednju pre prve
 * @return integer
 */
function getPrevProduct($currentId)
{
    $products = getAllProducts();
    foreach ($products as $key => $singleProduct) {
        $trenutniključ = array_search($currentId, array_column($products, "id"));
        if ($trenutniključ > $products[0] || $trenutniključ == count($products) - 1) {
            $prethodna = $products[$trenutniključ - 1]["id"];
        } else {
            $prethodna = $products[count($products) - 1]["id"];
        }
    }
    return $prethodna;
}

/** 
 * Funkcija vraća niz sličnih proizvoda
 * @return array
 */
function getRelatedByCategory($id)
{
    $products = getAllProducts();
    $trenutniproizvod = getOneProductById($id);
    foreach ($products as $key => $singleProduct) {
        if ($singleProduct["category"] == $trenutniproizvod["category"]) {
            $iskategorisaniniz[] = $singleProduct;
        }
    }
    $ključtrenutnog = array_search($trenutniproizvod, $iskategorisaniniz);
    unset($iskategorisaniniz[$ključtrenutnog]);
    return $iskategorisaniniz;
}

/**
 * Funkcija vraća random proizvode
 * @return array
 */
function getRandomProducts()
{
    $randProd = [];
    $products = getAllProducts();
    shuffle($products);
    foreach ($products as $singleProduct) {
        if (count($randProd) >= 6) {
            break;
        }
        $randProd[] = $singleProduct;
    }
    return $randProd;
}
