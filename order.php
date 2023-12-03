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
<script>
    $('#checkoutModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var totalAmount = button.data('totalamount');
        $(this).find('.modal-footer input[name="amount"]').val(totalAmount);
    });
    
</script>

<body>


    <?php
    include('partials_front/header.php');
    

// Check if food_id is set and action is add
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    // Fetch the food item details based on the food_id
    $sql = "SELECT * FROM food_items WHERE momo_id = $food_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);

        // Save the selected food item details in the session
        $_SESSION['order'][$food_id] = [
            'id' => $row['momo_id'],
            'title' => $row['momo_name'],
            'price' => $row['momo_price'],
            'quantity' => 1, // Default quantity is set to 1
        ];

        echo '<div class="success">Item added to your order!</div>';
    } else {
        echo '<div class="error">Error fetching food item details.</div>';
    }
}
// Handle quantity changes
if (isset($_POST['update_quantity'])) {
    foreach ($_POST['quantity'] as $food_id => $quantity) {
        // Update the quantity in the session
        $_SESSION['order'][$food_id]['quantity'] = $quantity;
    }
}

// Handle item removal
if (isset($_POST['remove_item'])) {
    $food_id_to_remove = $_POST['remove_item'];
    unset($_SESSION['order'][$food_id_to_remove]);
}

// Check if the order has been completed
if (isset($_POST['checkout']) && $_POST['checkout'] == 1) {
    // Clear the cart after successful checkout
    unset($_SESSION['order']);
    echo '<div class="success">Order placed successfully. Your cart is now empty.</div>';
}

// Display the selected food items in the session
if (!empty($_SESSION['order'])) {
    echo '<h2>Your Order</h2>';
    echo '<form action="" method="post">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Item</th>';
    echo '<th scope="col">Price</th>';
    echo '<th scope="col">Quantity</th>';
    echo '<th scope="col">Total</th>';
    echo '<th scope="col">Remove</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $totalAmount = 0;

    foreach ($_SESSION['order'] as $food_id => $item) {
        echo '<tr>';
        echo '<td>' . $item['title'] . '</td>';
        echo '<td>$' . $item['price'] . '</td>';
        echo '<td><input class="quantity-input" type="number" name="quantity[' . $food_id . ']" value="' . $item['quantity'] . '"></td>';

        $totalItemAmount = $item['quantity'] * $item['price'];
        echo '<td>$' . $totalItemAmount . '</td>';
        echo '<td><button type="submit" class="btn btn-danger btn-sm" name="remove_item" value="' . $food_id . '">Remove</button></td>';

        echo '</tr>';

        $totalAmount += $totalItemAmount;
    }

    echo '</tbody>';
    echo '</table>';

    echo '<p>Total Amount: $' . $totalAmount . '</p>';
    echo '<input type="hidden" name="update_quantity" value="1">';
    echo '<button type="submit" class="btn btn-warning float-right">Update Quantity</button>';
    echo '</form>';
    echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#checkoutModal" data-totalamount="' . $totalAmount . '">Checkout</button>';
} else {
    echo '<div class="col-md-12 my-5">
    <div class="card">
        <div class="card-body cart">
            <div class="col-sm-12 empty-cart-cls text-center"> 
                <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                <h3><strong>Your Cart is Empty</strong></h3>
                <h4>Add something and You can checkout directly from the page</h4>
                 <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a> 
                </div>
            </div>
        </div>
    </div>';
}
?>
<?php require 'partials_front/_checkoutModal.php';
include('partials_front/footer.php');
?>
