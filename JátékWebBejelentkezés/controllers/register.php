<?php

if (isset($_POST["submit"])) {

    require_once "database.php"; 

    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $username = mysqli_real_escape_string($connection, $_POST["form_username"]); /* SQL injection elleni védekezés */
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $passwordConfirm = mysqli_real_escape_string($connection, $_POST["passwordConfirm"]);

    if (
        empty($username) == true ||
        empty($password) == true ||
        empty($passwordConfirm) == true ||
        empty($email) == true
    ) {
        die("Tölts ki minden mezőt");
    } else {
        if ($password !== $passwordConfirm) {
            die("A két jelszó nem egyeezik");
        } else {
            if (strlen($password) < 8) {
                die("Legalább nyolc karakteres jelszó kell.");
            } elseif (preg_match("/[A-Z]/", $password) == false) {
                die("Legalább egy nagy betűt kell tartalmaznia a jelszónak.");
            } elseif (preg_match("/[a-z]/", $password) == false) {
                die("Legalább egy kis betűt kell tartalmaznia a jelszónak.");
            } elseif (preg_match("/[0-9]/", $password) == false) {
                die("Legalább egy számot kell tartalmaznia a jelszónak.");
            } elseif (preg_match("/[#@!%*.,;?:-_+-ß|]/", $password) == false) {
                die("Legalább egy speciális karaktert [#@!%*.,;?:-_+-ß|] kell tartalmaznia a jelszónak.");
            } else {

                if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    die("Nem helyes az e-mail cím formátuma");
                } else {
                    $query = 'SELECT * FROM users WHERE username = "' . $username . '";';
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) == 1) {
                        die("Már van ilyen nevű felhasználó.");
                    } elseif (mysqli_num_rows($result) > 1) {
                        die("Több ilyen felhasználó is van. HELP!");
                    } elseif (mysqli_num_rows($result) == 0) {


                        $query2 = 'SELECT * FROM users WHERE email = "' . $email . '";';
                        $result2 = mysqli_query($connection, $query2);

                        if (mysqli_num_rows($result2) == 1) {
                            die("Valaki regisztrált már ezzel az e-maillel.");
                        } elseif (mysqli_num_rows($result2) > 1) {
                            die("Többen is regisztráltak ezzel az emaillel, YÁY");
                        } elseif (mysqli_num_rows($result2) == 0) {
                            /* Nincs ilyen e-mail lehet tovább regisztrálni */

                            /* JELSZÓ LEVÉDÉSE (HASH) */
                            $vedettJelszo = password_hash($password, PASSWORD_DEFAULT);
                            
                            $registerQuery = 'INSERT INTO users (username, password, email) 
                            VALUES ("' .$username. '","' .$vedettJelszo. ' "," ' .$email. '");';
                            
                            mysqli_query($connection, $registerQuery);

                           header("Location: ../views/index.php?status=success");
                            
                        }
                    }
                }
            }
        }
    }
} else {
    die("A belépéshez regisztrálnod kell!");
}