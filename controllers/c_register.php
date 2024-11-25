<?php

if (isset($_POST["submit"])) {
    require_once "database.php";

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password_confirm = mysqli_real_escape_string($conn, $_POST["password_confirm"]);

    echo "<br>Adatok átkérve!";
    $query = "SELECT * FROM users WHERE email='" . $email . "';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != 0) {
        header("Location:../views/registration.php?error=emailExsist");
        die("Oops There is an account exists with this email");
    }

    /* filds filled ??? */
    if (empty($email) || empty($username) || empty($password) || empty($password_confirm)) {
        header("Location:../views/registration.php?error=emptyField");
        die("<br>Fill all fields");
    } else {
        /* Real email ???*/
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            header("Location:../views/registration.php?error=wrongEmailAddress");
            die("<br>Enter a real email address");
        } else {
            if (strlen($password) < 8) {
                header("Location:../views/registration.php?error=shortPassword");
                die("<br>At least 8 characters needed for a strong password!");
            } else if (!preg_match('/[A-Z]/', $password)) {
                header("Location:../views/registration.php?error=noCaptal");
                die('<br>Give at least one Capital letter');
            } else if (!preg_match('/[a-z]/', $password)) {
                header("Location:../views/registration.php?error=noLowecaseLetter");
                die('<br>Give at least one small letter');
            } else if (!preg_match('/[0-9]/', $password)) {
                header("Location:../views/registration.php?error=noNumber");
                die('<br>Give at least one number');
            } else if (!preg_match('/[$*#&_@]/', $password)) {
                header("Location:../views/registration.php?error=noSpecial");
                die('<br>Give at least one special character [$*#&@]');
            } else {
                echo '<br>Password is strong enough';
                if ($password !== $password_confirm) {
                    header("Location:../views/registration.php?error=passwordsDoNotMatch");
                    die('<br>Passwords do not match');
                } else {
                    /* Jelszó titkosítása */
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    /* Registration BAsic */
                    /*  $query = "INSERT INTO users (id, email, username, password) VALUES 
                     (
                     '" . $email . "',
                     '" . $username . "',
                     '" . $hashedPassword . "'
                     );"; */
                    /* Registration prepared Statment */
                    $sql = "INSERT INTO users (email, username, password) VALUES (?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPassword);
                        mysqli_stmt_execute($stmt);
                        echo "registration complete";
                        header("Location:../views/index.php?status=RegistrationComplete");
                    } else {
                        header("Location:../views/registration.php?error=wrongStatment");
                        die("Something went wron with the statment");
                    }

                }
            }
        }
    }
} else {
    header("Location:../views/registration.php?error=emptyForm");
    die("<br>Go to registration page and fill the form!");
}