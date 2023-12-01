<?php include('partials_front/header.php'); ?>

<!-- Search option -->
<section class="food-search text-center">
    <div class="container">
        <?php

        //Get the Search Keyword
        $search = $_POST['search'];

        ?>


        <h2><a href="#" class="text-white">Here are the dishes only for you! "
                <?php echo $search; ?>"
            </a></h2>

    </div>
</section>

<!-- Show the searched menu -->
<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        //SQL Query to Get foods based on search keyword
        $sql = "SELECT * FROM food_items WHERE momo_name LIKE '%$search%' OR momo_description LIKE '%$search%'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Check whether food available of not
        if ($count > 0) {
            //Food Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the details
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

                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">➕ Add to
                            Cart</a>
                    </div>
                </div>

                <?php
            }
        } else {
            //Food Not Available
            echo "<div class='error'>Food not found.</div>";
        }

        ?>
        <div class="clearfix"></div>
    </div>
 </section>
 <?php 
    include('partials_front/footer.php'); 
?>