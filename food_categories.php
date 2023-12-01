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

<!-- We will dump all food categories from the database in this section. -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Various Food Categories</h2>

        <?php 
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM food_category WHERE active='Yes'";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
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
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <div class="overlay">
                                        <p style="color:black;font-weight:bold;"><?php echo $description; ?></p>
                                    </div>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Momo" class="img-responsive img-curve" title="howww">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white" ><mark style="background-color:white;"><?php echo $title; ?></mark></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<?php 
    include('partials_front/footer.php'); 
?>