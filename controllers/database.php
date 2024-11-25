<?php 
$server = 'localhost';
$user = 'root';
$password = "";
$database = "laddershop";
$port = 3306;

$conn;

try {
    $conn = mysqli_connect($server, $user, $password, $database, $port);

} catch (\Throwable $th) {
    // throw $th;
    die("Something is wrong with the database connection !!");
}