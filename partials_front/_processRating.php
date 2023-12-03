<?php
session_start();
include('_dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin'])) {
    $user_id = $_SESSION['userId'];
    $rating = $_POST['rating'];

    // Check if the user has already rated the restaurant
    $check_rating_query = "SELECT * FROM ratings WHERE user_id = $user_id";
    $check_rating_result = mysqli_query($conn, $check_rating_query);

    if (mysqli_num_rows($check_rating_result) > 0) {
        // User has already rated
        echo '<p>You have already rated the restaurant.</p>';
    } else {
        // Insert the new rating into the database
        $insert_rating_query = "INSERT INTO ratings (user_id, rating) VALUES ($user_id, $rating)";
        $insert_rating_result = mysqli_query($conn, $insert_rating_query);

        if ($insert_rating_result) {
            echo '<p style="color:green; font-size:20px; font-weight: bold; text-align:center; margin-top:25px;">Thank you for your rating!</p>';
            echo '<p style="color:green; font-size:20px; font-weight: bold; text-align:center; margin-top:25px;">Redirecting you to the home page...</p>';
            header("refresh:2;url=../index.php");
        } else {
            echo '<p style="color:red; font-size:20px; font-weight: bold; text-align:center; margin-top:25px;>Failed to submit your rating. Please try again.</p>';
        }
    }
} else {
    echo '<p style="color:red; font-size:20px; font-weight: bold; text-align:center; margin-top:25px;>Invalid request. Please try again.</p>';
}
?>