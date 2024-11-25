<?php

if (isset($_POST["submit"])) {

    require_once("database.php");
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    if(empty($email) || empty($password)) {
        die("Fill everything");
    }else{
        $query = "SELECT * FROM users WHERE email='".$email."';";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) != 1) {
            die("Oops you cant type try again");
        }
        else{
            echo "LogIn";
            
            $userData = mysqli_fetch_assoc($result);
            if (password_verify($password, trim($userData["password"]))) {
                session_start();
                $_SESSION["username"] = $userData["username"];
                $_SESSION["userEmail"] = $userData["email"];
                $_SESSION["userid"] = $userData["id"];
                header("Location:../views/index.php?statusLoginSuccess");
            }else{
                die("Passwords not matching!");
            }
        }
    }
}
else{
    die("Don't cheat please");
}