<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepali Kitchen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">  
    <style>
    .img-responsive {
        width:45px;
        height:45px;
    }

    .card {
        width: 50vh;
        height: 50vh;
        margin: 10px;
        background-color:lightgray;
    }

    .btn-primary {
        padding-right: 10px;
    }
    .board {
    text-align:center;
    }

    /* Responsive Design for Small Devices */
    @media (max-width: 576px) {
        .card {
            position: relative;
        }
    }
    </style>
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
<!-- Special Deals Sections -->
<div class="container my-3 board" id="cont">
    <div class="col-lg-4 text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
        <h2 class="text-center"><span id="catTitle">Special Deals</span></h2>
    </div>
    <div class="row">
        <?php
            $sql = "SELECT * FROM `special_deals`";
            $result = mysqli_query($conn, $sql);
            $noResult = true;

            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $specialId = $row['id'];
                $specialName = $row['food_name'];
                $specialPrice = $row['price'];
                $specialDesc = $row['description'];
                $specialImage = $row['image'];
                $id = $specialId;
                // Showing all deals
                echo '<div class="special_deal">
                <div class="card">
                    <div class="img-container" style="height: 200px; overflow: hidden;">
                        <img src="' . SITEURL . 'images/special_deals/' . $specialImage . '" alt="special_deals" class="img-responsive img-curve" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">' . $specialName . '</h5>
                        <h6 style="color: #ff0000">Rs. ' . $specialPrice . '/-</h6>
                        <p class="card-text">' . $specialDesc . '</p>   
                        <div class="row justify-content-center">
                            <a href="' . SITEURL . 'order.php??action=add&food_id=' . $id . '" class="btn btn-primary">➕ Order Now </a>
                        </div>
                    </div>
                </div>
            </div>';
            }

            // if No deals are available
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry, no special deals available at the moment.</p>
                        <p class="lead">Check back later for exciting offers!</p>
                    </div>
                </div> ';
            }
        ?>
    </div>
</div>
<?php 
    include('partials_front/footer.php'); 
?>