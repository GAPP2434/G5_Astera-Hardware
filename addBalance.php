<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}

include "dbcon.php";
date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

// Check if the form is submitted
if (isset($_POST['addBalance'])) {
    // Get the amount from the form
    $amount = $_POST["amount"];

    // Check if the amount is valid
    if (!empty($amount)) {
        // Escape special characters to prevent SQL injection
        $amount = mysqli_real_escape_string($conn, $amount);

        // Insert the amount into the database
        $insertQuery = "UPDATE testtable SET dBalance = dBalance + $amount WHERE dUsername = '$username'";
        $insertResult = mysqli_query($conn, $insertQuery);

        // Check if the insertion was successful
        if ($insertResult) {
            // Redirect back to edit_item.php with a success message
            setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: balance.php');
            exit;
        } else {
            setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: balance.php');
            exit;
        }
    }
}
?>
