<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\public\bootstrap\icons\font\bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/style.css">
    <script src="../public/bootstrap/js/bootstrap.bundle.js" defer></script>
    <script src="../public/script.js" defer></script>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../views/index.php">LadderShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        Menu
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <?php echo !isset($_SESSION["username"]) ? '<a class="nav-link" href="../views/registration.php">Register</a>' : ""; ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Profile</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">

                                <?php echo !isset($_SESSION["username"]) ? '<a class="dropdown-item" href="../views/login.php">Login</a>' : ""; ?>
                                <?php echo isset($_SESSION["username"]) ? '<a class="dropdown-item" href="../views/settings.php">Setting</a>
                                <a class="dropdown-item" href="../controllers/c_logout.php">Logout</a>' : ""; ?>



                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>