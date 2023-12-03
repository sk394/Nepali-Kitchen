<?php include('partials/header.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content" style="height:100%">
    <div class="wrapper">
        <h1>Manage Messages</h1>

        <br />

        <?php 
            // Display session messages
            if(isset($_SESSION['message']))
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <br><br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    // Query to Get all Messages
                    $sql = "SELECT * FROM contact_form";
                    // Execute the Query
                    $res = mysqli_query($conn, $sql);

                    // Check whether the Query is Executed or Not
                    if($res==TRUE)
                    {
                        // Count Rows to Check whether we have data in the database or not
                        $count = mysqli_num_rows($res);

                        $sn=1; // Create a Variable and Assign the value

                        // Check the number of rows
                        if($count>0)
                        {
                            // We have data in the database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                // Get individual Data
                                $name = $rows['name'];
                                $email = $rows['email'];
                                $subject = $rows['subject'];
                                $message = $rows['message'];
                                $created_at = $rows['created_at'];

                                // Display the Values in our Table
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $sn++; ?></th>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $subject; ?></td>
                                    <td><?php echo $message; ?></td>
                                    <td><?php echo $created_at; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            // No data in the database
                            echo '<tr><td colspan="6" class="text-center">No Messages Found</td></tr>';
                        }
                    }
                ?>

            </tbody>
        </table>

    </div>
</div>


<?php include('partials/footer.php'); ?>
