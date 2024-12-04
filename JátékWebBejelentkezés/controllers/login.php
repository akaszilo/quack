<?php
 
echo 'Login initialized <br>';
 
require 'database.php';

$username = mysqli_real_escape_string($connection, $_POST["username"]); 
$password = mysqli_real_escape_string($connection, $_POST["password"]);

$query = 'SELECT * FROM users WHERE username = "'. $username .'";'; 
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) != 1) {
    die("Rossz felhasználónevet adtál meg.");
}
else {
    /* Megnézzük, hogy jó-e a jelszó */
    $userData = mysqli_fetch_assoc($result); 
    
    $hashed = trim($userData['password']);
    $check = password_verify($password, $hashed);

    if ($check) {
        /* SESSION */
        session_start();
        $_SESSION['username'] = $userData['username'];
        $_SESSION['email'] = $userData['email'];
        header("Location: ../views/index.php");
    }
    else {
        echo '<br> Hibás jelszó';
    }
}
