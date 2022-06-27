<main class="pt-5 nike-pattern">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-dark">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
    <?php if ($isValidFlag == true) { ?>
        <div class="col-lg-5">
            <div class="alert alert-secondary alert-dismissible fade show mx-5" role="alert">
                <span class="text-dark">Vaša poruka je uspešno sačuvana</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="container row gap-2">
        <form class="col-lg-6" method="POST" action="">
            <div class="border border-dark rounded p-4 mx-5 bg-light shadow">
                <div class="w-100">
                    <label for="ime-kontakta">Ime</label>
                    <input type="text" class="form-control" id="ime-kontakta" placeholder="Ime" name="ime-kontakta">
                </div>
                <small class="text-danger">
                    <?php if (isset($_POST["upit"]) && empty(trim($_POST["ime-kontakta"]))) echo htmlspecialchars($systemErrors[0]); ?>
                </small>
                <div class="w-100">
                    <label for="prezime-kontakta">Prezime</label>
                    <input type="text" class="form-control" id="prezime-kontakta" placeholder="Prezime" name="prezime-kontakta">
                    <small class="text-danger">
                        <?php if (isset($_POST["upit"]) && empty(trim($_POST["prezime-kontakta"]))) echo htmlspecialchars($systemErrors[1]); ?>
                    </small>
                </div>
                <div class="w-100">
                    <label for="email-kontakta">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="text" class="form-control" id="email-kontakta" placeholder="E-mail" aria-describedby="inputGroupPrepend3" name="email-kontakta">
                    </div>
                    <small class="text-danger">
                        <?php if (isset($_POST["upit"]) && empty(trim($_POST["email-kontakta"]))) echo htmlspecialchars($systemErrors[2]);
                        else if (isset($_POST["upit"]) && strpos(trim($_POST["email-kontakta"]), "@") == false) echo htmlspecialchars($systemErrors[3]) ?>
                    </small>
                </div>
                <div>
                    <label for="Poruka">Poruka</label>
                    <textarea class="w-100 mb-2 rounded" name="poruka-kontakta" id="Poruka" cols="30" rows="10"></textarea>
                    <small class="text-danger"><?php if (isset($_POST["upit"]) && empty(trim($_POST["poruka-kontakta"]))) echo htmlspecialchars($systemErrors[4]); ?></small>
                </div>
                <div class="text-center"><button class="btn btn-dark rounded-pill" type="submit" name="upit">Pošalji upit</button></div>
        </form>
    </div>
    <div class="col-lg-6 row">
        <div class="my-auto ml-5">
            <h1 class="fw-bold display-4">Kontaktiraj nas</h1>
            <p>Naš tim je ažuran i na društvenim mrežama 24 sata, tako da nam se možeš obratiti i tu.</p>
            <div class="mb-3">
                <a href="#"><i class="fa-brands fa-facebook text-secondary"></i></a>
                <a href="#"><i class="fa-brands fa-twitter text-secondary"></i></a>
                <a href="#"><i class="fa-brands fa-instagram text-secondary"></i></a>
                <a href="#"><i class="fa-brands fa-slack text-secondary"></i></a>
            </div>
            <h5 class="fw-bold">Najčešća pitanja</h5>

            <h6 class="fw-bold">Kako da poručim model putem sajta?</h6>

            <p>Preporučujemo da izvršite proces registracije kako bi Vam u narednom koraku bila olakšana online kupovina na našem sajtu. Ukoliko želite da se registrujete to možete učiniti klikom na link ovde.</p>


            <h6 class="fw-bold">Koji je rok isporuke?</h6>

            <p>Rok isporuke za preuzete pakete u periodu od ponedeljka u 00 časova do petka u 10 časova kurirska služba će dostaviti pakete u roku od 72 časa. Za robu poručenu u periodu od petka u 10 časova do nedelje u 24 časa kurirska služba dostaviće pakete najkasnije u četvrtak. Tokom praznika isporuka se vrši u skladu sa radnim vremenom kurirske službe koja radi dostavu.</p>


            <h6 class="fw-bold">Šta se dešava kada izvršim narudžbu?</h6>

            <p>Nakon uspešno izvršene narudžbine, korisniku će stići potvrdni mail sa podacima o poručenim artiklima. Registrovani korisnici mogu pratiti status svoje isporuke na našem sajtu putem otvorenog naloga. Od trenutka narudžbine možete očekivati isporuku u skladu sa odgovorima na pitanje navedenim u prethodnom pitanju.</p>
        </div>
    </div>
    </div>
</main>