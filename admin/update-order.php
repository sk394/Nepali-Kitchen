<?php include('partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM order_details WHERE orderid=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);
                    $userId = $row['userId'];
                    $total = $row['amount'];
                    $status = $row['orderStatus'];
                    $customer_contact = $row['phoneNo'];
                    $customer_address1 = $row['address'];
                    $zipcode = $row['zipCode'];
                    $customer_address = $customer_address1." ".$zipcode;
                   
                    $user = "SELECT * FROM users WHERE id='$userId'";
                    $user_res = mysqli_query($conn, $user);
                    $user_row = mysqli_fetch_assoc($user_res);
                    $f_name = $user_row['firstName'];
                    $l_name = $user_row['lastName'];
                    $customer_name = $f_name." ".$l_name;
                    $customer_email = $user_row['email'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/orderItems.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/orderItems.php');
            }
        
        ?>

        <form action="" method="POST">
               <tr>
                    <td>Order Id: </td>
                    <td><b> <?php echo $id; ?> </b></td>
                </tr>
            <table class="tbl-30">
                <tr>
                    <td>Status</td>
                    <td>
                    <select name="status">
    <option value="0" <?php echo ($status == '0') ? 'selected' : ''; ?>>Order Placed</option>
    <option value="1" <?php echo ($status == '1') ? 'selected' : ''; ?>>Order Confirmed</option>
    <option value="2" <?php echo ($status == '2') ? 'selected' : ''; ?>>Preparing your Order</option>
    <option value="3" <?php echo ($status == '3') ? 'selected' : ''; ?>>Order On Way</option>
    <option value="4" <?php echo ($status == '4') ? 'selected' : ''; ?>>Order Delivered</option>
    <option value="5" <?php echo ($status == '5') ? 'selected' : ''; ?>>Order Denied</option>
    <option value="6" <?php echo ($status == '6') ? 'selected' : ''; ?>>Order Cancelled</option>
</select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">


                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
                $id = $_POST['id'];

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //Update the Values
                $sql2 = "UPDATE order_details SET 
                    orderStatus = '$status',
                    phoneNo = '$customer_contact',
                    address = '$customer_address'
                    WHERE orderid=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/orderItems.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/orderItems.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>