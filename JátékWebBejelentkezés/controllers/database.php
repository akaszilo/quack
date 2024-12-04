<?php
 
$server = "localhost";
$username = "root";
$password = "";
$database = "catWarrior";
$port = 3306;

$connection = mysqli_connect($server, $username, 
$password, $database, $port) or die("No database for you!");