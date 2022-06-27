<main class="pt-5 nike-pattern row justify-content-center">
    <?php if ($userexists == true) { ?>
        <div class="col-lg-5">
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <span class="text-dark">Ovaj korisnik već postoji. <a class="text-dark" href="login.php">Uloguj se.</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="container row justify-content-center">
        <form class="col-lg-5" method="POST">
            <div class="border border-dark rounded p-4 bg-light shadow">
                <div class="text-center pb-3"><img src="./public/theme/img/logo.png" height="20" alt="Logo"></div>
                <div class="w-100">
                    <label for="ime-usera">Ime</label>
                    <input type="text" class="form-control" id="ime-usera" placeholder="Ime" name="ime-usera">
                    <?php if (isset($_POST["register"])) {
                        if (empty(trim($_POST["ime-usera"]))) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[0]; ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="w-100">
                    <label for="prezime-usera">Prezime</label>
                    <input type="text" class="form-control" id="prezime-usera" placeholder="Prezime" name="prezime-usera">
                    <?php if (isset($_POST["register"])) {
                        if (empty(trim($_POST["prezime-usera"]))) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[1]; ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="w-100">
                    <label for="email-usera">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="text" class="form-control" id="email-usera" placeholder="E-mail" aria-describedby="inputGroupPrepend3" name="email-usera">
                    </div>
                    <?php if (isset($_POST["register"])) {
                        if (empty(trim($_POST["email-usera"]))) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[2]; ?>
                            </div>
                        <?php } else if (strpos(trim($_POST["email-usera"]), "@") == false) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[3]; ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="w-100 row">
                    <div class="col-md-6">
                        <label for="lozinka-usera">Lozinka</label>
                        <input type="password" class="form-control" id="lozinka-usera" placeholder="Lozinka" name="lozinka-usera">
                    </div>
                    <div class="col-md-6">
                        <label for="ponovi-lozinku-usera">Ponovi lozinku</label>
                        <input type="password" class="form-control" id="ponovi-lozinku-usera" placeholder="Ponovo upiši isto" name="ponovi-lozinku-usera">
                    </div>
                </div>
                <?php if (isset($_POST["register"])) {
                    if (empty($_POST["lozinka-usera"])) { ?>
                        <div class="text-danger">
                            <?php echo $systemErrors[4]; ?>
                        </div>
                    <?php } else if (strlen($_POST["lozinka-usera"]) < 8 || !preg_match("@[A-Z]@", $_POST["lozinka-usera"]) || !preg_match("@[a-z]@", $_POST["lozinka-usera"]) || !preg_match("@[0-9]@", $_POST["lozinka-usera"]) || !preg_match("@[^\w]@", $_POST["lozinka-usera"])) { ?>
                        <small class="text-danger">
                            <?php echo $systemErrors[5]; ?>
                        </small>
                    <?php } else if (!empty($_POST["lozinka-usera"]) && empty(trim($_POST["ponovi-lozinku-usera"]))) { ?>
                        <div class="text-danger">
                            <?php echo $systemErrors[6]; ?>
                        </div>
                    <?php } else if (!empty($_POST["lozinka-usera"]) && $_POST["ponovi-lozinku-usera"] != $_POST["lozinka-usera"]) { ?>
                        <div class="text-danger">
                            <?php echo $systemErrors[7]; ?>
                        </div>
                <?php }
                } ?>
                <div class="w-100">
                    <label for="godine-usera">Broj godina</label>
                    <input type="text" class="form-control" id="godine-usera" placeholder="Broj godina" name="godine-usera">
                    <?php if (isset($_POST["register"])) {
                        if (empty(trim($_POST["godine-usera"]))) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[8]; ?>
                            </div>
                        <?php } else if (!is_numeric($_POST["godine-usera"]) || $_POST["godine-usera"] < 0) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[9]; ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="w-100">
                    <label>Pol</label>
                    <div>
                        <input type="radio" name="pol-usera" id="Ženski" value="ženski">
                        <label for="Ženski">Ženski</label>
                        <input type="radio" name="pol-usera" id="Muški" value="muški">
                        <label for="Muški">Muški</label>
                    </div>
                    <?php if (isset($_POST["register"])) {
                        if (empty($_POST["pol-usera"])) { ?>
                            <div class="text-danger">
                                <?php echo $systemErrors[10]; ?>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="text-center"><button class="btn btn-dark rounded-pill w-50 mt-3" name="register" type="submit">Registruj se</button></div>
                <div class="text-center mt-2">
                    <small>Već imaš profil?</small>
                    <div><a class="text-dark" href="login.php"><small>Uloguj se</small></a></div>
                </div>
        </form>
    </div>
</main>