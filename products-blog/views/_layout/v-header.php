<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($headerTitle)) {
                echo $headerTitle;
            } else {
                echo "Undefined";
            } ?></title>
    <link rel="stylesheet" href="./public/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/theme/css/custom.css">
    <link rel="stylesheet" href="./public/theme/css/animate.css">
</head>

<body class="min-vh-100">
    <!-- Start header -->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light px-3" href="#"><img src="./public/theme/img/logo.png" height="28" alt="Nike Logo"> <span class="text-black">SHOE SHOP</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($headerTitle == "Shoe Shop") echo "active"; ?>" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($headerTitle == "Proizvodi") echo "active"; ?>" href="./products-page.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($headerTitle == "Contact us") echo "active"; ?>" href="./contact-us.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($headerTitle == "About Us") echo "active"; ?>" href="./about-us.php">About Us</a>
                        </li>
                        <?php if ($_SESSION["loggedIn"] == false) { ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($headerTitle == "Login" || $headerTitle == "Register") echo "active"; ?>" href="./login.php">Log In</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <div class="dropdown show mx-2">
                                    <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Profile
                                    </a>

                                    <div class="dropdown-menu start-96" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="profile-page.php">Edit profile</a>
                                        <a class="dropdown-item" href="create-product-page.php">Create new product</a>
                                        <a class="dropdown-item" href="logout-page.php">Logout</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (!empty($_SESSION["cart"])) { ?>
                            <li>
                                <a class="nav-link btn  <?php echo "bg-light"; ?> btn-outline-dark rounded-pill position-relative <?php if ($endpoint == "shopping-cart-page.php") {
                                                                                                                                        echo "active bg-light";
                                                                                                                                    } ?>" href="shopping-cart-page.php">
                                    Shopping Cart <i class="fa-solid fa-cart-arrow-down text-secondary"></i>

                                    <span class="position-absolute top-1 start-95 translate-middle badge rounded-pill bg-danger">
                                        <?php
                                        echo $shoppingCart->getCompleteQuantity();
                                        ?>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->