<?php

namespace Models\Product;

use Models\Model\Model;

class Product extends Model
{
    const ORDER_BY_PRICE_ASC = 'ceni-rastuće';
    const ORDER_BY_PRICE_DESC = 'ceni-opadajuće';

    public $id;
    public $title;
    public $description;
    public $status;
    public $price;
    public $category;
    public $img;
    public $brand;
    public $stock;

    public function __construct($product)
    {
        $this->id = $product['id'];
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->status = $product['status'];
        $this->price = $product['price'];
        $this->category = $product['category'];
        $this->img = $product['img'];
        $this->brand = $product["brand"];
        $this->stock = $product["stock"];
        $this->barcode = $product["barcode"];
    }

    public static function getAllProducts()
    {
        parent::connection('shoe_products');
        $allProducts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $singleProduct) {
                $allProducts[] = new self($singleProduct);
            }
        }
        return $allProducts;
    }

    public static function getAvailableProducts()
    {
        $availableProducts = [];
        foreach (self::getAllProducts() as $singleProduct) {
            if ($singleProduct->status == 1) {
                $availableProducts[] = $singleProduct;
            }
        }
        return $availableProducts;
    }
    /**
     * Funkcija vraca jedan proizvod po ID
     * 
     * @param integer $id
     * @return mixed 
     */
    public static function getOneProductById($id)
    {
        $products = self::getAvailableProducts();
        foreach ($products as $singleProduct) {
            if ($singleProduct->id == $id) {
                return $singleProduct;
            }
        }
    }

    public static function searchProductsbyTerm($term = "")
    {
        $flitriraniniz = [];
        $products =  self::getAvailableProducts();
        foreach ($products as $singleProduct) {
            if (
                $term == $singleProduct->title ||
                $term == $singleProduct->brand ||
                $term == $singleProduct->description ||
                stripos($singleProduct->title, $term) !== FALSE ||
                stripos($singleProduct->brand, $term) !== FALSE ||
                stripos($singleProduct->description, $term) !== FALSE
            ) {
                $filtriraniniz[] = $singleProduct;
            }
        }
        return $filtriraniniz;
    }

    public static function sortProductBy($sortBy = "")
    {
        $products = self::getAvailableProducts();
        if (!empty($sortBy)) {
            if ($sortBy == self::ORDER_BY_PRICE_ASC) {
                foreach ($products as $key => $singleProduct) {
                    $nizcena[] = $singleProduct->price;
                    asort($nizcena);
                }
                foreach ($nizcena as $k => $v) {
                    $sortiraniniz[] = $products[$k];
                }
                return $sortiraniniz;
            } else if ($sortBy == self::ORDER_BY_PRICE_DESC) {
                foreach ($products as $key => $singleProduct) {
                    $nizcena[] = $singleProduct->price;
                    arsort($nizcena);
                }
                foreach ($nizcena as $k => $v) {
                    $sortiraniniz[] = $products[$k];
                }
                return $sortiraniniz;
            }
        } else return $products;
    }
    /**
     * Funkcija vraća random proizvode
     * @return array
     */
    public static function getRandomProducts()
    {
        $randProd = [];
        $products = self::getAvailableProducts();
        shuffle($products);
        foreach ($products as $singleProduct) {
            if (count($randProd) >= 6) {
                break;
            }
            $randProd[] = $singleProduct;
        }
        return $randProd;
    }
    /** 
     * Funkcija vraća niz sličnih proizvoda
     * @return array
     */
    public function getRelatedByCategory($id)
    {
        $iskategorisaniniz = [];
        $products = self::getAvailableProducts();
        $trenutniproizvod = self::getOneProductById($id);
        foreach ($products as  $key => $singleProduct) {
            if ($singleProduct->category == $trenutniproizvod->category) {
                $iskategorisaniniz[] = $singleProduct;
            }
        }
        $ključtrenutnog = array_search($trenutniproizvod, $iskategorisaniniz);
        unset($iskategorisaniniz[$ključtrenutnog]);
        return $iskategorisaniniz;
    }

    /** 
     * Funkcija vraća sledeću stranicu i prvu nakon poslednje
     * @return integer
     */
    public function getNextProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $singleProduct) {
            if ($singleProduct->id == $this->id) {
                if ($key == (count($products) - 1)) {
                    $sledeća = $products[0]->id;
                } else {
                    $sledeća = $products[$key + 1]->id;
                }
            }
        }
        return $sledeća;
    }

    /** 
     * Funkcija vraća prethodnu stranicu i poslednju pre prve
     * @return integer
     */
    public function getPrevProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $singleProduct) {
            if ($singleProduct->id == $this->id) {
                if ($key == 0) {
                    $prethodna = $products[count($products) - 1]->id;
                } else {
                    $prethodna = $products[$key - 1]->id;
                }
            }
        }
        return $prethodna;
    }

    /**
     * Funkcija vraća broj proizvoda klase Product
     * @return integer
     */
    public static function getPagProduct($start, $limit)
    {
        $sqlQueryString = "SELECT * FROM shoe_products WHERE status=1 LIMIT :start, :limit";
        $statement = parent::connection('shoe_products')->prepare($sqlQueryString);
        $statement->bindValue('start', (int) trim($start), \PDO::PARAM_INT);
        $statement->bindValue('limit', (int) trim($limit), \PDO::PARAM_INT);
        $statement->execute();
        foreach ($statement->fetchAll() as $singleProduct) {
            $PagProducts[] = new self($singleProduct);
        }
        return $PagProducts;
    }

    public static function InsertNewProduct($title, $price, $stock, $barcode, $status, $brand, $category, $description, $image)
    {
        $sqlQueryString = "INSERT INTO shoe_products (title, price, stock, barcode, status, brand, category, description, img)"
            . " VALUES (" . ":title" . ", " . ":price" . ", " . ":stock" . ", " . ":barcode" . ", " . ":status" . ", "
            . ":brand" . ", " . ":category" . ", " . ":description" . ", " . ":image" . ")";
        $statement = parent::connection('shoe_products')->prepare($sqlQueryString);
        $podaci = [
            'title' => $title,
            'price' => $price,
            'stock' =>  $stock,
            'barcode' => $barcode,
            'status' => $status,
            'brand' => $brand,
            'category' => $category,
            'description' => $description,
            'image' => $image
        ];
        $status = $statement->execute($podaci);
    }
}
