<main class="min-vh-100 nike-pattern pt-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="products-page.php" class="link-dark">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
    <div class="container row gap-2">
        <div class="col-lg-8">
            <div class="ml-5">
                <form action="" method="POST">
                    <h4 class="fw-bold mb-3">Vaša korpa</h4>
                    <table class="table table-bordered shadow">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col">Obriši proizvode</th>
                                <th scope="col">Proizvod</th>
                                <th scope="col">Količina</th>
                                <th scope="col">Cena</th>
                                <th scope="col">Obriši proizvod</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $singleProduct) { ?>
                                <?php
                                $ukupnacena = $singleProduct->getFullPrice();
                                $ukupno += $ukupnacena;
                                ?>
                                <tr class="bg-light">
                                    <td class="text-center align-middle" scope="row"><input type="checkbox" name="remove[]" value="<?php echo htmlspecialchars($singleProduct->getProduct()->id); ?>"></td>
                                    <td>
                                        <div><img class="img-fluid w-25" src="<?php echo htmlspecialchars($singleProduct->getProduct()->img); ?>">
                                            <p class="d-inline-block"><?php echo " " . htmlspecialchars($singleProduct->getProduct()->title); ?></p>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="input-group">
                                            <div class="input-group-prepend" id="button-addon3">
                                                <button class="btn btn-outline-secondary" type="submit" name="-" value="<?php echo htmlspecialchars($singleProduct->getProduct()->id); ?>">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="<?php echo $singleProduct->getQuantity(); ?>" aria-describedby="button-addon3">
                                            <div class="input-group-append" id="button-addon3">
                                                <button class="btn btn-outline-secondary" type="submit" name="+" value="<?php echo htmlspecialchars($singleProduct->getProduct()->id); ?>">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle"><?php echo number_format($singleProduct->getFullPrice()); ?></td>
                                    <td class="text-center align-middle"><button type="submit" name="close" class="btn-close" aria-label="Close" value="<?php echo htmlspecialchars($singleProduct->getProduct()->id); ?>"></button></td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                    <button class="btn btn-dark rounded-pill w-25 mt-3 shadow" type="submit" name="obriši">OBRIŠI</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 row text-center">
            <div class="my-auto bg-dark rounded p-5 ml-5 shadow border-light">
                <h5 class="fw-bold text-light">Ukupan iznos:</h5>
                <p class="text-light"><?php echo number_format($ukupno) . " din."; ?></p>
                <a class="btn btn-outline-light rounded-pill w-50" href="checkout-page.php">PORUDŽBINA</a>
            </div>
        </div>
    </div>
</main>