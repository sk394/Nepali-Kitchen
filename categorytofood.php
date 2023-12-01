<?php 
    include('partials_front/header.php');
?>

<!-- Check if the category is valid or not -->
<?php 
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM food_category WHERE id=$category_id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];
        }
        else
        {
            header('location:'.SITEURL);
        }
?>
<section class="food-search text-center">
        <div class="container">
            
            <h2><a href="#" class="text-white">Foods on "<?php echo $category_title; ?>"</a></h2>
        </div>
</section>

<!-- pretty basic from here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Our Food Menu</h2>

        <?php 
        
        //Getting Foods from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM food_items WHERE momo_category_id=$category_id";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //Check whether food available or not
        if($count2>0)
        {
            //Food Available
            while($row=mysqli_fetch_assoc($res2))
            {
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
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //Image Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/momo/<?php echo $image_name; ?>" alt="food_items" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">➕ Add to Cart</a>
                    </div>
                </div>

                <?php
            }
        }
        else
        {
            //Food Not Available 
            echo "<div class='error'>Food not available.</div>";
        }
        
        ?>
        <div class="clearfix"></div>
    </div>
 </section>
 <?php 
    include('partials_front/footer.php'); 
?>
