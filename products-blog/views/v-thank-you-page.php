<main class="nike-pattern min-vh-100 pt-5">
    <div class="container">
        <div class="alert alert-success mb-5" role="alert">
            Čestitamo. Uspešno ste obavili kupovinu. Proizvodi koje ste naručili su:<br>
            <?php foreach ($products as $singleProduct) {
                echo "- " . $singleProduct->getProduct()->title . "<br>";
                $ukupno += $singleProduct->getFullPrice();
            }
            ?>
            Ukupan iznos je: <?php echo number_format($ukupno) . " din."; ?>
        </div>
        <p>Nazad na <a class="text-dark" href="products-page.php">Shop</a>.</p>
    </div>
</main>