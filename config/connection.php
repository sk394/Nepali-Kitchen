<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/nepali_kitchen');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '@Bimala9847'); // Change this to your password
    define('DB_NAME', 'nepali_kitchen');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //SElecting Database
?>