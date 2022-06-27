<main class="pt-5 nike-pattern">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-dark">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <form action="" class="mt-2" method="GET">
            <section class="d-md-flex flex-row justify-content-between">
                <div>
                    <label for="sortiranje">Sortiraj:</label>
                    <select name="sortiranje" id="sortiranje" class="p-1 px-2 rounded-pill">
                        <option value="" selected>Opcije</option>
                        <option value="ceni-opadajuće">Po ceni opadajuće</option>
                        <option value="ceni-rastuće">Po ceni rastuće</option>
                    </select>
                </div>
                <div>
                    <input type="text" placeholder="Ukucaj proizvod" name="pretraga">
                    <button class="rounded-pill btn-primary" type="submit">Pretraži proizvode</button>
                </div>
            </section>
        </form>
        <section class="row mt-4">
            <?php foreach ($products as $key => $singleProduct) { ?>
                <div class="col-lg-4 col-md-6 bg-light">
                    <div class="m-2 border border-primary rounded-5 p-3 shadow">
                        <div class="d-flex">
                            <img src="<?php echo $singleProduct->img; ?>" class="img-fluid w-50" alt="...">
                            <div class="text-center mt-3 ml-01">
                                <p class="card-text"><?php echo number_format($singleProduct->price) . " din"; ?></p>
                                <a href="./single-product-page.php?page=<?php echo $singleProduct->id; ?>" class="btn btn-dark text-light rounded-pill">
                                    <small>Vidi proizvod</small>
                                </a>
                                <div>
                                    <button form="add-to-cart-<?php echo htmlspecialchars($singleProduct->id); ?>" class="btn btn-outline-dark mt-2 rounded-pill">Dodaj u <i class="fa-solid fa-cart-arrow-down"></i></button>
                                    <form id="add-to-cart-<?php echo htmlspecialchars($singleProduct->id); ?>" method="POST" action="">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($singleProduct->id); ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title"><?php echo $singleProduct->title; ?></h5>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
    <nav class="d-flex justify-content-center mt-3" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="text-dark page-link" href="products-page.php?page=<?php echo $prethodna; ?>">Prethodna stranica</a></li>
            <?php for ($i = 1; $i <= $brojstranica; $i++) { ?>
                <li class="page-item"><a class="text-dark page-link" href="products-page.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li class="page-item"><a class="text-dark page-link" href="products-page.php?page=<?php echo $sledeća; ?>">Sledeća stranica</a></li>
        </ul>
    </nav>
</main>