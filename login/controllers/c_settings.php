<?php
session_start();

if(isset($_POST["submit"])){
    require_once "database.php";

    $email = mysqli_real_escape_string($conn, $_SESSION["userEmail"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    
    $error = array();

    if(empty($email) || empty($username)){
        array_push($error,"empty");
    }
    if ( $_SESSION["username"]=== $_POST["username"]){
        array_push($error,"nothingNew");
    }

    if (count($error)> 0){
        $_SESSION["errors"] = $error;
        die("You have some errors");
    }
    else{
        $query = "UPDATE users SET username = '".$username."' where email='".$email."';";
        mysqli_query($conn, $query);

        $_SESSION["username"] = $username;
        header("Location?../views/settings.php?status=updaetComplete");
    }
}
else{
    die("le vagy kezelve");
}