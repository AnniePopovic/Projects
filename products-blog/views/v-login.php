<main class="pt-5 nike-pattern row justify-content-center min-vh-100">
    <div class="container row justify-content-center">
        <form class="col-lg-5" method="POST">
            <div class="border border-dark rounded p-4 bg-light shadow">
                <div class="text-center pb-3"><img src="./public/theme/img/logo.png" height="20" alt="Logo"></div>
                <div class="w-100">
                    <label for="email-login">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        </div>
                        <input type="text" class="form-control" id="email-login" placeholder="E-mail" aria-describedby="inputGroupPrepend3" name="email-login">
                    </div>
                </div>
                <small class="text-danger">
                    <?php if (isset($_POST["login"]) && empty($_POST["email-login"])) echo $systemErrors[1]; ?>
                </small>
                <div class="w-100">
                    <label for="lozinka-login">Lozinka</label>
                    <input type="password" class="form-control" id="lozinka-login" placeholder="Prezime" name="lozinka-login">
                </div>
                <small class="text-danger">
                    <?php if (isset($_POST["login"]) && empty($_POST["lozinka-login"])) {
                        echo $systemErrors[2];
                    } else if (isset($_POST["login"]) && $_SESSION["loggedIn"] == false) echo $systemErrors[0]; ?>
                </small>
                <div class="text-center"><button class="btn btn-dark rounded-pill w-50 mt-3" type="submit" name="login">Uloguj se</button></div>
                <div class="text-center mt-2">
                    <small>Nemaš napravljen profil?</small>
                    <div><a class="text-dark" href="register.php"><small>Registruj se</small></a></div>
                </div>
        </form>
    </div>
</main>