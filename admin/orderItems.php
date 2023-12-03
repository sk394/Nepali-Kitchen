<?php include('partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food Order</h1>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th width="5%">#</th>
                <th width="10%">Order Date</th>
                <th width="10%">Total</th>
                <th width="8%">Status</th>
                <th width="10%">Customer Name</th>
                <th width="10%">Contact</th>
                <th width="15%">Email</th>
                <th width="10%">Address</th>
                <th>Actions</th>
            </tr>

            <?php
            //Get all the orders from database
            $sql = "SELECT * FROM order_details ORDER BY orderid DESC"; // DIsplay the Latest Order at First
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the Rows
            $count = mysqli_num_rows($res);

            $sn = 1; //Create a Serial Number and set its initail value as 1
            
            if ($count > 0) {
                //Order Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get all the order details
                    $id = $row['orderid'];
                    $userId = $row['userId'];
                    $total = $row['amount'];
                    $order_date = $row['orderDate'];
                    $status = $row['orderStatus'];
                    $customer_contact = $row['phoneNo'];
                    $customer_address1 = $row['address'];
                    $zipcode = $row['zipCode'];
                    $customer_address = $customer_address1 . " " . $zipcode;

                    $user = "SELECT * FROM users WHERE id='$userId'";
                    $user_res = mysqli_query($conn, $user);
                    $user_row = mysqli_fetch_assoc($user_res);
                    $f_name = $user_row['firstName'];
                    $l_name = $user_row['lastName'];
                    $customer_name = $f_name . " " . $l_name;
                    $customer_email = $user_row['email'];

                    ?>

                    <tr>
                        <td>
                            <?php echo $sn++; ?>
                        </td>
                        <td>
                            <?php echo $order_date; ?>
                        </td>
                        <td>
                            <?php echo '$' . $total; ?>
                        </td>


                        <td>
                            <?php

                            if ($status == '0') {
                                echo "<label style='color: blue;'>Order Placed</label>";
                            } elseif ($status == '1') {
                                echo "<label style='color: orange;'>Order Confirmed</label>";
                            } elseif ($status == '2') {
                                echo "<label style='color: orange;'>Preparing your Order</label>";
                            } elseif ($status == '3') {
                                echo "<label style='color: green;'>Order On Way</label>";
                            } elseif ($status == '4') {
                                echo "<label style='color: green;'><b>Order Delivered</b></label>";
                            } elseif ($status == '6') {
                                echo "<label style='color: red;'><b>Order Cancelled</b></label>";
                            } else {
                                echo "<label style='color: red;'>Order Denied</label>";
                            }
                            ?>
                        </td>

                        <td>
                            <?php echo $customer_name; ?>
                        </td>
                        <td>
                            <?php echo $customer_contact; ?>
                        </td>
                        <td>
                            <?php echo $customer_email; ?>
                        </td>
                        <td>
                            <?php echo $customer_address; ?>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"
                                class="btn-secondary">Update Order</a>
                        </td>
                    </tr>

                    <?php

                }
            } else {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
            }
            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>