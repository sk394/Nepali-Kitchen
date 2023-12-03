<?php include('partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Week's Special Dishes</h1>

        <br /><br />

        <!-- Button to Add Admin -->
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['unauthorize'])) {
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>

            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM special_deals";

            //Execute the qUery
            $res = mysqli_query($conn, $sql);

            //Count Rows to check whether we have foods or not
            $count = mysqli_num_rows($res);

            //Create Serial Number VAriable and Set Default VAlue as 1
            $sn = 1;

            if ($count > 0) {
                //We have food in Database
                //Get the Foods from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $id = $row['id'];
                    $title = $row['food_name'];
                    $price = $row['price'];
                    $image_name = $row['image'];
                    $startDate = $row['offer_start_date'];
                    $endDate = $row['offer_end_date'];
                    ?>

                    <tr>
                        <td>
                            <?php echo $sn++; ?>.
                        </td>
                        <td>
                            <?php echo $title; ?>
                        </td>
                        <td>$
                            <?php echo $price; ?>
                        </td>
                        <td>
                            <?php
                            //CHeck whether we have image or not
                            if ($image_name == "") {
                                //WE do not have image, DIslpay Error Message
                                echo "<div class='error'>Image not Added.</div>";
                            } else {
                                //WE Have Image, Display Image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/special_deals/<?php echo $image_name; ?>" width="100px">
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $startDate; ?>
                        </td>
                        <td>
                            <?php echo $endDate; ?>
                        </td>

                        <td>
                            <a href="#" class="btn-secondary">Update Food</a>
                            <a href="#" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>

                    <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
            }

            ?>


        </table>
    </div>

</div>

</body>

</html>