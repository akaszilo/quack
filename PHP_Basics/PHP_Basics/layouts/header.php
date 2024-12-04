<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhP with Bootstrap</title>

    <!-- Bootstrap framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <nav class="navbar bg-dark fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PhP Basic Exercises with Form handling</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] . "'s Menu" : "Menu" ?>
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                        </li>
                        <?php
                        if (isset($_SESSION["username"]) == false) { ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../views/registration.php">Register</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Exercises</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="../views/exercise_1.php">Exercise 1</a>
                                <a class="dropdown-item" href="#">Exercise 2</a>
                            </div>
                        </li>
                    </ul>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo '<form action="../controllers/logout.php" method="POST">';
                        echo '<button class="btn btn-outline-danger" type="submit" name="submit">Logout</button>';
                        echo '</form>';
                    } else {
                        echo '<form action="../controllers/login.php" method="POST">';
                        echo '<input class="form-control me-2 mb-3" type="email" placeholder="E-mail address" name="email" />';
                        echo '<input class="form-control me-2 mb-3" type="password" placeholder="Password" name="password"/>';
                        echo '<button class="btn btn-outline-success" type="submit" name="submit">Login</button>';
                        echo '</form>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">