<?php 

    include('../config/connection.php'); 
    include('loginCheck.php');

?>

<html>
    <head>
        <title>Nepali Kitchen</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="foodCategory.php">Category</a></li>
                    <li><a href="foodItems.php">Food Items</a></li>
                    <li><a href="orderItems.php">Order Section</a></li>
                    <li><a href="adminDetails.php">Manage Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->