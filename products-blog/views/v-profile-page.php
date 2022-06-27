<main class="pt-5 nike-pattern min-vh-100">
    <div class="container">
        <?php if ($isValidFlag == true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>Uspešno sačuvane promene.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <h5 class="fw-bold">Moj profil <i class="fa-solid fa-address-card h3 ml-2"></i></i></h5>
        <div class="row bg-trans shadow p-1 rounded">
            <div class="col-4 bg-light shadow d-flex flex-column text-center p-3 py-5">
                <div class="w-100 mb-3"><img class="w-75" src="./public/theme/img/<?php if (isset($user["profile_image"])) echo $user["profile_image"]; ?>" alt=""></div>
                <?php if (isset($_POST["update"])) { ?><div><label class="btn btn-dark rounded-pill">Promeni sliku <i class="fa-solid fa-upload"></i> <input type="file" form="update" accept="image/*" name="image"></label></div> <?php } ?>
            </div>
            <div class="col-8 px-0">
                <form class="mb-0" action="" method="POST" id="update" enctype="multipart/form-data">
                    <div class="rounded p-4 bg-light shadow">
                        <div class="text-center pb-3"><img src="./public/theme/img/logo.png" height="20" alt="Logo"></div>
                        <div class="w-100">
                            <label for="ime-update">Ime</label>
                            <input <?php if (!isset($_POST["update"])) echo "disabled"; ?> type="text" class="form-control" id="ime-update" value="<?php if (isset($user["name"])) echo $user["name"] ?>" name="ime-update">
                            <?php if (isset($_POST["save"])) {
                                if (empty(trim($_POST["ime-update"]))) { ?>
                                    <div class="text-danger">
                                        <?php echo $systemErrors[0]; ?>
                                    </div>
                            <?php }
                            }  ?>
                        </div>
                        <div class="w-100">
                            <label for="prezime-update">Prezime</label>
                            <input <?php if (!isset($_POST["update"])) echo "disabled"; ?> type="text" class="form-control" id="prezime-update" value="<?php if (isset($user["last_name"])) echo $user["last_name"] ?>" name="prezime-update">
                            <?php if (isset($_POST["save"])) {
                                if (empty(trim($_POST["prezime-update"]))) { ?>
                                    <div class="text-danger">
                                        <?php echo $systemErrors[1]; ?>
                                    </div>
                            <?php }
                            }  ?>
                        </div>
                        <div class="w-100">
                            <label for="email-update">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                </div>
                                <input disabled type="text" class="form-control" id="email-update" value="<?php if (isset($user["e_mail"])) echo $user["e_mail"] ?>" aria-describedby="inputGroupPrepend3" name="email-update">
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="lozinka-update"><?php if (isset($_POST["promeni-lozinku"])) echo "Nova lozinka";
                                                        else echo "Lozinka"; ?></label>
                            <div class="input-group">
                                <input type="text" class="form-control" <?php if (!isset($_POST["promeni-lozinku"])) echo "disabled placeholder=\"Klikni da promeniš lozinku\""; ?> aria-label="Recipient's username" aria-describedby="basic-addon2" name="lozinka-update" id="lozinka-update">
                                <div class="input-group-append">
                                    <?php if (!isset($_POST["promeni-lozinku"]) || isset($_POST["sačuvaj-lozinku"])) { ?>
                                        <button class="btn btn-dark" type="submit" name="promeni-lozinku">Promeni lozinku</button>
                                    <?php } else { ?>
                                        <button class="btn btn-dark" type="submit" name="sačuvaj-lozinku">Sačuvaj lozinku</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_POST["sačuvaj-lozinku"]) && !empty($_POST["lozinka-update"])) { ?>
                            <div class="text-danger">
                                <?php if (strlen($_POST["lozinka-update"]) < 8 || !preg_match("@[A-Z]@", $_POST["lozinka-update"]) || !preg_match("@[a-z]@", $_POST["lozinka-update"]) || !preg_match("@[0-9]@", $_POST["lozinka-update"]) || !preg_match("@[^\w]@", $_POST["lozinka-update"])) {
                                    echo $systemErrors[3];
                                } else if (empty($_POST["ponovi-lozinku-update"])) {
                                    echo $systemErrors[6];
                                } else if ($_POST["ponovi-lozinku-update"] != $_POST["lozinka-update"])
                                    echo $systemErrors[7]; ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_POST["promeni-lozinku"])) { ?>
                            <div class="w-100">
                                <label for="ponovi-lozinku-update">Ponovi lozinku:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="ponovi-lozinku-update" id="ponovi-lozinku-update">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="w-100">
                            <label for="godine-update">Broj godina</label>
                            <input <?php if (!isset($_POST["update"])) echo "disabled"; ?> type="text" class="form-control" id="godine-update" value="<?php if (isset($user["age"])) echo $user["age"] ?>" name="godine-update">
                            <?php if (isset($_POST["save"])) {
                                if (empty(trim($_POST["godine-update"]))) { ?>
                                    <div class="text-danger">
                                        <?php echo $systemErrors[4]; ?>
                                    </div>
                                <?php } else if (!is_numeric($_POST["godine-update"]) || $_POST["godine-update"] < 0) { ?>
                                    <div class="text-danger">
                                        <?php echo $systemErrors[5]; ?>
                                    </div>
                            <?php }
                            }  ?>
                        </div>
                        <div class="w-100">
                            <label>Pol:</label>
                            <div>
                                <?php if (!isset($_POST["update"])) { ?>
                                    <p><?php if (isset($user["gender"])) echo $user["gender"] ?></p>
                                <?php } else { ?>
                                    <input type="radio" name="pol-update" id="Ženski" value="ženski" <?php if (!isset($_POST["save"])) {
                                                                                                            if ($user["gender"] == "ženski") echo "checked";
                                                                                                        } ?>>
                                    <label for="Ženski">Ženski</label>
                                    <input type="radio" name="pol-update" id="Muški" value="muški" <?php if (!isset($_POST["save"])) {
                                                                                                        if ($user["gender"] == "muški") echo "checked";
                                                                                                    } ?>>
                                    <label for="Muški">Muški</label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-dark rounded-pill w-25 mt-3" name="update" type="submit">Izmeni podatke</button>
                            <button class="btn btn-dark rounded-pill w-25 mt-3" name="save" <?php if (isset($_POST["update"])) echo "enabled;";
                                                                                            else echo "disabled"; ?> type="submit">Sačuvaj izmene</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>