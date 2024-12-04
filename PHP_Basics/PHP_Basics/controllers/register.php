<?php

echo "Registering the user has been started.";

if (isset($_POST["submit"])) {
    /*0 Kérjük be az adatbázis adatait és kapcsolódjunk */
    require_once 'database.php';

    /* Error array */
    $errors = array(); /* For future improvements TODO: Implement error handling */

    /*1 Kérj át minden adatot a form-tól */
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password_confirm = mysqli_real_escape_string($connection, $_POST['password_confirm']);

    /*2 Nézd meg, hogy minden ki van-e töltve */
    if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        header("Location:../views/registration.php?error=empty");
        die();
    } else {
        /*3 A jelszó erőssége
        Minimum 8 karakter
        Minimum egy kis betű
        Minimum egy nagy betű
        Minimum egy szám
        Minimum egy speciális karakter
        */
        if (strlen($password) < 8) {
            die("Túl kevés a karakterek száma.");
        }
        else if (preg_match('/[A-Z]/', $password) == false) {
            die("Legalább egy nagy betű legyen benne");
        }
        else if (preg_match('/[a-z]/', $password) == false) {
            die("Legalább egy kis betű legyen benne");
        }
        else if (preg_match('/[0-9]/', $password) == false) {
            die("Legalább egy szám legyen benne");
        }
        else if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password) == false) {
            die("Legalább egy speciális karakter legyen benne");
        }
        else if ($password !== $password_confirm) {
            die("A jelszó megerősítése sikertelen.");
        }
        else {
            /*4 Tényleg e-mailt címet adott-e meg (filter funkció) */
            if (filter_var($email, FILTER_VALIDATE_EMAIL ) == false) {
                die("Nem jó e-mail formátum");
            }
            else {
                /* 1. - Van-e ilyen felhasználó */
                $sql_query = "SELECT * FROM users WHERE email = '{$email}';";
                echo "A futtatni kívánt sql kód: {$sql_query}<br>";

                $result = mysqli_query($connection, $sql_query);
                
                if (mysqli_num_rows($result) != 0) {
                    die("Sajnos van már ilyen e-mail címmel felhasználó.");
                }
                else {
                    /* Jelszó hashelése */

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    /* Regisztrálok */
                    /* Prepared Statement */
                    $register_query = "INSERT INTO users (`username`, email, password) VALUES (?, ?, ?)";
                    $statement = mysqli_stmt_init($connection);

                    if (mysqli_stmt_prepare($statement, $register_query)) {
                        mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashed_password);
                        mysqli_stmt_execute($statement);

                        /* Reg complete, redirect */
                        header("Location:../views/registration.php?msg=regcomplete");
                    }
                    else {
                        die("There is a database error.");
                    }
                }
            }
        }


    }
} else {
    //header("Location: ../views/registration.php?status=buttonError");
    die("Don't cheat or I kill you.");
}