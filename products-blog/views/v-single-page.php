<main class="pt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="products-page.php" class="link-dark">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($singleProduct->title); ?></li>
            </ol>
        </nav>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-8">
                    <img src="<?php echo htmlspecialchars($singleProduct->img); ?>" class="img-fluid w-50" alt="...">
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-4"><?php echo htmlspecialchars($singleProduct->title); ?></h1>
                    <p class="h3 mb-3"><?php echo number_format($singleProduct->price) . " din."; ?></p>
                    <p><?php echo htmlspecialchars($singleProduct->brand); ?></p>
                    <p><?php echo htmlspecialchars($singleProduct->category); ?></p>
                    <div>
                        <label for="količina">Količina:</label>
                        <select name="količina" id="količina">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <?php if ($singleProduct->stock > 2) { ?><option value="3">3</option><?php } ?>
                            <?php if ($singleProduct->stock > 3) { ?><option value="4">4</option><?php } ?>
                            <?php if ($singleProduct->stock > 4) { ?><option value="5">5</option><?php } ?>
                        </select>
                    </div>
                    <?php if ($singleProduct->stock == 2) { ?>
                        <div><small class="text-danger"><?php echo "Još samo dva komada su ostala. Požuri!"; ?></small></div>
                    <?php } ?>
                    <input type="hidden" name="id_proizvoda" value="<?php echo htmlspecialchars($singleProduct->id); ?>">
                    <button type="submit" class="btn btn-outline-dark rounded-pill mt-3" name="poruči">PORUČI PROIZVOD</button>
                </div>
        </form>
    </div>
    <div class="text-center my-4">
        <a class="btn btn-danger" href="./single-product-page.php?page=<?php echo htmlspecialchars($singleProduct->getPrevProductId()); ?>">PREV</a>
        <a class="btn btn-outline-dark" href="./products-page.php">IDI NAZAD</a>
        <a class="btn btn-success" href="./single-product-page.php?page=<?php echo htmlspecialchars($singleProduct->getNextProductId()); ?>">NEXT</a>
    </div>
    </div>
    <div class="container">
        <p><?php echo htmlspecialchars($singleProduct->description); ?></p>
    </div>
    <div class="container">
        <p><?php if (!empty($iskategorisaniniz)) echo "Proizvodi iz slične kategorije:";
            else echo "Nema sličnih proizvoda."; ?></p>
        <div class="row">
            <?php foreach ($kategorije as $key => $singleProduct) { ?>
                <div class="col-md-4">
                    <div class="m-2 border border-primary rounded-5 p-3">
                        <div class="d-flex">
                            <div class="w-50"><img src="<?php echo $singleProduct->img ?>" class="img-fluid" alt="..."></div>
                            <div class="text-center mt-4 ml">
                                <p class="card-text"><?php echo number_format($singleProduct->price) . " din"; ?></p>
                                <p><?php echo htmlspecialchars($singleProduct->brand); ?></p>
                                <p><?php echo htmlspecialchars($singleProduct->category); ?></p>
                                <a href="./single-product-page.php?page=<?php echo $singleProduct->id; ?>" class="btn btn-dark text-light rounded-pill">Pogledaj</a>
                            </div>
                        </div>
                        <h5 class="card-title"><?php echo $singleProduct->title; ?></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>