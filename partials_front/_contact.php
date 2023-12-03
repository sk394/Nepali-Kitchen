<?php
// Include database connection file
include('_dbconnect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL query to insert data into the contact_form table
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query and check for success
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // If insertion fails, show an error message
        die("Error: " . mysqli_error($conn));
    } else {
        // If insertion is successful, redirect to a thank-you page or show a success message
        // You can modify this part based on your requirements
        header("Location: thank-you-page.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: ../contact.php");
    exit();
}
?>