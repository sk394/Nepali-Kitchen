<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepali Kitchen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">  
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<body>


<?php 
    include('partials_front/header.php');
?>

<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food_search.php" method="POST">
            <input type="search" name="search" placeholder="Search Foods" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<div>
    <p style="color:green; font-size:25px; text-align:center; margin-top:30px;">Rate us!</p>
</div>

<?php
include('partials_front/_dbconnect.php');

// Check if the user is logged in
if (isset($_SESSION['loggedin'])) {
    $user_id = $_SESSION['userId'];
    
    // Check if the user has already rated the restaurant
    $check_rating_query = "SELECT * FROM ratings WHERE user_id = $user_id";
    $check_rating_result = mysqli_query($conn, $check_rating_query);
    
    if (mysqli_num_rows($check_rating_result) > 0) {
        echo '<p style="color:blue; font-size:25px; text-align:center;">You have already rated the restaurant.</p>';
    } else {
        // Display the rating form
        echo '
            <form action="process_rating.php" method="POST" style="margin-top: 20px; text-align:center; margin-bottom:50px;">
                <label for="rating" style="font-size: 18px; margin-right: 10px;">Rate the restaurant:</label>
                <select name="rating" id="rating" required style="padding: 8px; font-size: 16px;">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                <input type="submit" name="submit" value="Submit Rating" style="padding: 8px 12px; background-color: #007bff; color: #fff; border:none; cursor:pointer;">
            </form>
        ';
    }
} else {
    echo '<p>Login to rate the restaurant.</p>';
}
?>

<?php 
    include('partials_front/footer.php'); 
?>