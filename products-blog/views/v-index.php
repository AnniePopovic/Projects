<main class="pt-3 nike-pattern">
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 vh-100 obj-cover" src="./public/theme/img/carousel1.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="t-s">Snaga</h5>
            <p class="t-s">Obuća koja traje večno.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 vh-100 obj-cover" src="./public/theme/img/carousel2.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="t-s">Izdržljivost</h5>
            <p class="t-s">Ostavi trag.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 vh-100 obj-cover" src="./public/theme/img/carousel3.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="t-s">Kvalitet</h5>
            <p class="t-s">Život je prekratak za loše patike.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row my-5">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/adidaslogo.png" alt="Adidas">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/reeboklogo.png" alt="Rebook">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/PUMA-logo.png" alt="PUMA">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/jordanlogo.png" alt="Jordan">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/logo.png" alt="Nike">
      <img class="col-2 h-75 my-auto" src="./public/theme/img/championlogo.png" alt="Champion">
    </div>


    <div class="container">
      <h5 class="text-center my-5 fw-bold">NAJPRODAVANIJI PROIZVODI</h5>
      <div class="row">
        <?php foreach ($najprodavaniji as $key => $singleProduct) { ?>
          <div class="col-md-4">
            <div class="m-2 border border-primary rounded-5 p-3 shadow bg-light">
              <div class="d-flex">
                <div class="w-50"><img src="<?php echo htmlspecialchars($singleProduct->img) ?>" class="img-fluid" alt="..."></div>
                <div class="text-center mt-4 ml">
                  <p class="card-text"><?php echo number_format($singleProduct->price) . " din"; ?></p>
                  <p><?php echo htmlspecialchars($singleProduct->brand); ?></p>
                  <p><?php echo htmlspecialchars($singleProduct->category); ?></p>
                  <a href="./single-product-page.php?page=<?php echo htmlspecialchars($singleProduct->id); ?>" class="btn btn-dark text-light rounded-pill">Pogledaj</a>
                </div>
              </div>
              <h5 class="card-title"><?php echo htmlspecialchars($singleProduct->title); ?></h5>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="block-height col-md-6 bg-primary my-5 m-auto rounded animate__animated animate__tada animate__repeat-2 shadow">
      <div class="text-center pt-5">
        <h1 class="text-black text-center font-style display-3">LETNJA PONUDA:</h1>
        <h1 class="text-black text-center font-style display-3">DODATI NOVI MODELI</h1>
        <p>Naruči patike odmah. Šaljemo u roku od 24 sata!</p>
        <a href="products-page.php" class="btn btn-black text-light rounded-pill animate__animated animate__pulse animate__infinite">NARUČI</a>
        <div class="m-5"><img src="./public/theme/img/logo.png" height="20" alt="Nike Logo"></div>
      </div>
    </div>
  </div>
  <div class="container">
    <h5 class="text-center my-5 fw-bold">NAJGLEDANIJI PROIZVODI</h5>
    <div class="row">
      <?php foreach ($najgledaniji as $key => $singleProduct) { ?>
        <div class="col-md-4">
          <div class="m-2 border border-primary rounded-5 p-3 shadow bg-light">
            <div class="d-flex">
              <div class="w-50"><img src="<?php echo htmlspecialchars($singleProduct->img) ?>" class="img-fluid" alt="..."></div>
              <div class="text-center mt-4 ml">
                <p class="card-text"><?php echo number_format($singleProduct->price) . " din"; ?></p>
                <p><?php echo htmlspecialchars($singleProduct->brand); ?></p>
                <p><?php echo htmlspecialchars($singleProduct->category); ?></p>
                <a href="./single-product-page.php?page=<?php echo htmlspecialchars($singleProduct->id); ?>" class="btn btn-dark text-light rounded-pill">Pogledaj</a>
              </div>
            </div>
            <h5 class="card-title"><?php echo htmlspecialchars($singleProduct->title); ?></h5>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  </div>
</main>