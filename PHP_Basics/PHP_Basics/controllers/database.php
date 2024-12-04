<?php 

$server = "localhost";
$port = 3306;
$username = "root";
$password = "";
$database = "scambooks";

$connection;

try {
    $connection = mysqli_connect($server, $username, $password, $database, $port);
    echo "<br>Connected to the database<br>";
} catch (\Throwable $th) {
    die("Something is wrong with the database");
}