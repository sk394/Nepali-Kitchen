<?php
$server = "localhost";
$username = "root";
$password = "@Bimala9847";
$database = "nepali_kitchen";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
