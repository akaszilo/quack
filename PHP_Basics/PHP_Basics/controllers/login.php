<?php

if (isset($_POST['submit'])) {
    
    require "database.php";
    session_start();

    $errors = array();

    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    if (empty($email)) {
        array_push($errors, 'emailEmpty');
    }
    if (empty($password)) {
        array_push($errors, 'passwordEmpty');
    }

    if (count($errors) != 0) {
        die("You have some errors.");
    }

    /* Van ilyen? */
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1) {
        /* Jelszó check */
        $user = mysqli_fetch_assoc($result);
        $goodPassword = password_verify($password, $user["password"]);

        if ($goodPassword) {
            /* Login */
            echo '<br>Login ok.';
            $_SESSION["userId"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            header("Location:../views/index.php?msg=loginOk");

        }
        else {
            array_push($errors,  'passwordWrong');
            die("Wrong password");
        }
    }
    else {
        array_push($errors,  'emailWrong');
        die("Elírtad az e-mailt.");
    }

}
else {
    die("Nyomd meg a gombot.");
}