<main class="pt-5">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-dark">Home</a></li>
            <li class="breadcrumb-item"><a href="products-page.php" class="link-dark">Products</a></li>
            <li class="breadcrumb-item"><a href="shopping-cart-page.php" class="link-dark">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
      <div>
        <h5 class="fw-bold mb-3">Naručeni proizvodi</h5>
      </div>
    </div>
    <form action="" method="POST">
      <div class="row">
        <div class="col-md-6">
          <div class="border border-secondary rounded shadow dark p-3">
            <div class="form-group">
              <label for="ime">Ime</label>
              <input type="text" class="form-control" id="ime" placeholder="Unesi ime" name="ime">
              <?php if (isset($_POST["naruči"])) {
                if (empty(trim($_POST["ime"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[0]; ?></small><?php }
                                                                                                                                          } ?>
            </div>
            <div class="form-group">
              <label for="prezime">Prezime</label>
              <input type="text" class="form-control" id="prezime" placeholder="Unesi prezime" name="prezime">
              <?php if (isset($_POST["naruči"])) {
                if (empty(trim($_POST["prezime"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[1]; ?></small><?php }
                                                                                                                                              } ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Unesi email" name="email">
              <?php if (isset($_POST["naruči"])) {
                if (empty(trim($_POST["email"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[2]; ?></small><?php } else if (strpos(trim($_POST["email"]), "@") == false) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[3]; ?></small><?php } else if (strpos(trim($_POST["email"]), " ")) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[4]; ?></small><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="grad">Grad</label>
                <input type="text" class="form-control" id="grad" placeholder="Grad" name="grad">
                <?php if (isset($_POST["naruči"])) {
                  if (empty(trim($_POST["grad"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[5]; ?></small><?php }
                                                                                                                                            } ?>
              </div>
              <div class="form-group col-6">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" placeholder="Telefon" name="telefon">
                <?php if (isset($_POST["naruči"])) {
                  if (empty(trim($_POST["telefon"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[6]; ?></small><?php } else if (!is_numeric($_POST["telefon"])) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[7]; ?></small><?php } else if (strlen(trim($_POST["telefon"])) < 9 || strlen(trim($_POST["telefon"])) > 11) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[7]; ?></small><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
              </div>
              <div class="form-group col-6">
                <label for="ulica">Ulica</label>
                <input type="text" class="form-control" id="ulica" placeholder="Ulica" name="ulica">
                <?php if (isset($_POST["naruči"])) {
                  if (empty(trim($_POST["ulica"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[8]; ?></small><?php }
                                                                                                                                              } ?>
              </div>
              <div class="form-group col-6">
                <label for="uip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="Zip" name="zip">
                <?php if (isset($_POST["naruči"])) {
                  if (empty(trim($_POST["zip"]))) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[9]; ?></small><?php } else if (!is_numeric($_POST["zip"])) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[6]; ?></small><?php } else if (strpos(trim($_POST["zip"]), " ")) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[4]; ?></small><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                      } ?>
              </div>
              <div class="form-group">
                <label>Komentar</label>
                <textarea class="form-control" name="komentar" placeholder="Komentar...." cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="ček" name="ček">
              <label class="form-check-label" for="ček">Da li se slažete sa pravilima?</label>
              <?php if (isset($_POST["naruči"])) {
                if (empty($_POST["ček"])) { ?><small name="poruka" class="form-text text-muted"><?php echo $systemErrors[10]; ?></small><?php }
                                                                                                                                    } ?>
            </div>
          </div>
        </div>
        <div class="container col-md-6">
          <table class="table table-bordered shadow">
            <thead class="bg-dark text-light">
              <tr>
                <th scope="col">Proizvod</th>
                <th scope="col">Količina</th>
                <th scope="col">Cena</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $singleProduct) { ?>
                <?php $ukupno += $singleProduct->getFullPrice(); ?>
                <tr class="bg-light">
                  <td>
                    <div><img class="img-fluid w-15" src="<?php echo htmlspecialchars($singleProduct->getProduct()->img); ?>">
                      <p class="d-inline-block"><?php echo " " . htmlspecialchars($singleProduct->getProduct()->title); ?></p>
                    </div>
                  </td>
                  <td class="text-center align-middle">
                    <div><?php echo $singleProduct->getQuantity(); ?></div>
                  </td>
                  <td class="text-center align-middle"><?php echo number_format($singleProduct->getFullPrice()) . " din."; ?></td>
                </tr>
              <?php } ?>
              <tr>
                <td colspan="3" class="align-middle">
                  <p>Ukupan iznos: <?php echo number_format($ukupno) . " din."; ?></p>
                </td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-dark rounded-pill w-50 right" name="naruči">Naruči</button>
        </div>
      </div>
  </div>
  </form>
  </div>
</main>