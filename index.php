<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepali Kitchen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
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

    <!-- Food Categories -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Various Food Categories</h2>

            <?php
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM food_category WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get the Values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $description = $row['categoryDesc'];
                    ?>

                    <a href="<?php echo SITEURL; ?>categorytofood.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            //Check whether Image is available or not
                            if ($image_name == "") {
                                //Display MEssage
                                echo "<div class='error'>Image not Available</div>";
                            } else {
                                //Image Available
                                ?>
                                <div class="overlay">
                                    <p style="color:black;font-weight:bold;">
                                        <?php echo $description; ?>
                                    </p>
                                </div>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Momo"
                                    class="img-responsive img-curve" title="howww">
                                <?php
                            }
                            ?>


                            <h3 class="float-text text-white"><mark style="background-color:white;">
                                    <?php echo $title; ?>
                                </mark></h3>
                        </div>
                    </a>

                    <?php
                }
            } else {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>


    <!-- Food Menu Section-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Our Food Menu</h2>

            <?php

            //Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM food_items WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //Check whether food available or not
            if ($count2 > 0) {
                //Food Available
                while ($row = mysqli_fetch_assoc($res2)) {
                    //Get all the values
                    $id = $row['momo_id'];
                    $title = $row['momo_name'];
                    $price = $row['momo_price'];
                    $description = $row['momo_description'];
                    $image_name = $row['momo_image'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            //Check whether image available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                //Image Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/momo/<?php echo $image_name; ?>" alt="food_items"
                                    class="img-responsive img-curve">
                                <?php
                            }
                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h4>
                                <?php echo $title; ?>
                            </h4>
                            <p class="food-price">$
                                <?php echo $price; ?>
                            </p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <?php
                            $loggedin = isset($_SESSION['userId']); // Assuming you have a session variable for user login status
                    
                            if ($loggedin) {
                                $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE momo_id = ? AND `userId` = ?";
                                $stmt = mysqli_prepare($conn, $quaSql);
                                mysqli_stmt_bind_param($stmt, "ss", $momo_id, $userId);
                                mysqli_stmt_execute($stmt);
                                $quaresult = mysqli_stmt_get_result($stmt);
                                $quaExistRows = mysqli_num_rows($quaresult);

                                if ($quaExistRows == 0) {
                                    echo '<form action="partials_front/_manageCart.php" method="POST">
              <input type="hidden" name="itemId" value="' . $id . '">
              <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>
              </form>';
                                } else {
                                    echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                                }
                            } else {
                                echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                }
            } else {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }

            ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>

    <?php
    include('partials_front/footer.php');
    ?>