<main class="pt-5 nike-pattern min-vh-100">
    <div class="container">
        <form method="POST" id="ProductForm" enctype="multipart/form-data">
            <div class="border border-dark rounded p-4 bg-light shadow">
                <div class="mb-3 d-flex justify-content-between">
                    <h5 class="text-decoration-underline fw-bold d-inline">Kreiraj novi proizvod</h6> <img src="./public/theme/img/logo.png" height="20" alt="Logo">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="w-100">
                            <label for="title">Naziv proizvoda <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" placeholder="Upišite pun naziv proizvoda" value="<?php if (isset($_POST["title"])) echo $_POST["title"]; ?>" name="title">
                        </div>
                        <?php if (isset($_POST["kreiraj"]) && empty($_POST["title"])) { ?>
                            <small class="text-danger">
                                <?php echo $systemErrors[0]; ?>
                            </small>
                        <?php } ?>
                        <div class="w-100">
                            <label for="price">Cena <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RSD</span>
                                </div>
                                <input type="text" class="form-control" name="price" id="price" value="<?php if (isset($_POST["price"])) echo $_POST["price"]; ?>" placeholder="Upišite cenu u dinarima (npr. 10000) bez zareza i tačke">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_POST["kreiraj"])) { ?>
                            <small class="text-danger">
                                <?php if (empty($_POST["price"])) echo $systemErrors[1];
                                else if (!is_numeric($_POST["price"])) echo $systemErrors[2];
                                else if ($_POST["price"] < 0) echo $systemErrors[3]; ?>
                            </small>
                        <?php } ?>
                        <div class="w-100 row mb-3">
                            <div class="col-md-4">
                                <label for="stock">Količina (zalihe) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="stock" value="<?php if (isset($_POST["stock"])) echo $_POST["stock"]; ?>" placeholder="Količina" name="stock">
                                <?php if (isset($_POST["kreiraj"])) { ?>
                                    <small class="text-danger">
                                        <?php if (empty($_POST["stock"])) echo $systemErrors[4];
                                        else if (!is_numeric($_POST["stock"])) echo $systemErrors[5];
                                        else if ($_POST["stock"] < 0) echo $systemErrors[3]; ?>
                                    </small>
                                <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <label for="barcode">Barkod <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="barcode" value="<?php if (isset($_POST["barcode"])) echo $_POST["barcode"]; ?>" placeholder="Jedinstveni barkod" name="barcode">
                                <?php if (isset($_POST["kreiraj"])) { ?>
                                    <small class="text-danger">
                                        <?php if (empty($_POST["barcode"])) echo $systemErrors[6];
                                        else if (!is_numeric($_POST["barcode"])) echo $systemErrors[7];
                                        else if ($_POST["barcode"] < 0) echo $systemErrors[3];
                                        else if (in_array($_POST["barcode"], $barcodes)) echo $systemErrors[8]; ?>
                                    </small>
                                <?php } ?>
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <div>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1">Dostupne</option>
                                        <option value="0">Nisu dostupne</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            Upišite ili izaberite brend i kategoriju. <span class="text-danger">*</span>
                        </div>
                        <?php if (isset($_POST["kreiraj"])) { ?>
                            <small class="text-danger">
                                <?php if (empty($_POST["brand"]) && empty($_POST["new-brand"])) echo $systemErrors[9] . "<br>"; ?>
                            </small>
                        <?php } ?>
                        <?php if (isset($_POST["kreiraj"])) { ?>
                            <small class="text-danger">
                                <?php if (empty($_POST["category"]) && empty($_POST["new-category"])) echo $systemErrors[10]; ?>
                            </small>
                        <?php } ?>
                        <div class="w-100 row mb-3">
                            <div class="col-md-6">
                                <label for="brand">Brend</label>
                                <select name="brand" id="brand" class="form-select">
                                    <option value="" <?php if (isset($_POST["brand"]) && $_POST["brand"] == "") echo "selected"; ?>>Izaberi brend</option>
                                    <?php foreach ($brands as $brand) { ?>
                                        <option value="<?php echo $brand; ?>" <?php if (isset($_POST["brand"]) && $_POST["brand"] == $brand) echo "selected"; ?>><?php echo $brand; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="category">Kategorija</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="" <?php if (isset($_POST["category"]) && $_POST["category"] == "") echo "selected"; ?>>Izaberi kategoriju</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category; ?>" <?php if (isset($_POST["category"]) && $_POST["category"] == $category) echo "selected"; ?>><?php echo $category; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-100 row mb-3">
                            <div class="col-md-6">
                                <label for="new-brand">Novi brend (opciono)</label>
                                <input type="text" class="form-control" value="<?php if (isset($_POST["new-brand"])) echo $_POST["new-brand"]; ?>" id="new-brand" name="new-brand">
                            </div>
                            <div class="col-md-6">
                                <label for="new-category">Nova kategorija (opciono)</label>
                                <input type="text" class="form-control" value="<?php if (isset($_POST["new-category"])) echo $_POST["new-category"]; ?>" id="new-category" name="new-category">
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="description">Opis proizvoda <span class="text-danger">*</span></label>
                            <?php if (isset($_POST["kreiraj"])) { ?>
                                <small class="text-danger">
                                    <?php if (empty($_POST["description"])) echo $systemErrors[11]; ?>
                                </small>
                            <?php } ?>
                            <div><textarea class="w-100 form-control" name="description" id="description" cols="30" rows="10"><?php if (isset($_POST["description"])) echo $_POST["description"]; ?></textarea></div>
                        </div>
                    </div>
                    <div class="col-md-6 border-start border-secondary text-center">
                        <?php if (isset($_POST["kreiraj"])) { ?>
                            <h5 class="text-danger">
                                <?php if ($_FILES["image"]["error"] == 4) echo $systemErrors[12]; ?>
                            </h5>
                        <?php } ?>
                        <div class="w-100 mb-3"><img class="w-75" src="./public/theme/img/sneakers.png" alt=""></div>
                        <div class="mb-2">Slika <span class="text-danger">*</span></div>
                        <div"><label class="btn btn-dark rounded-pill">Postavi sliku <i class="fa-solid fa-upload"></i>
                                <div class="p-2"><input type="file" accept="image/*" name="image"></div>
                            </label>
                    </div>
                </div>
            </div>
    </div>
    <div class="text-center"><button class="btn btn-dark rounded-pill w-25 mt-3" name="kreiraj" type="submit">Kreiraj proizvod</button></div>
    </form>
    </div>
</main>