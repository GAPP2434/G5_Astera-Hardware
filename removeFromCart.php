<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
include "dbcon.php";
date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

    // Check if the removeSingleQuantity button was clicked
if (isset($_POST['removeSingleQuantity'])) {
    // Retrieve the item code from the form
    $itemCode = $_POST['itemCode'];

    // Construct the select query to fetch the current quantity of the item
    $selectQuery = "SELECT dItemQuantity FROM tblusercart WHERE dItemCode = '$itemCode'";
    $selectResult = mysqli_query($conn, $selectQuery);

    // Check if the select query was successful
    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $currentQuantity = $row['dItemQuantity'];

        // Check if the current quantity is exactly 1
        if ($currentQuantity == 1) {
            // If the current quantity is 1, remove the entire entry
            $deleteQuery = "DELETE FROM tblusercart WHERE dItemCode = '$itemCode'";
        } else {
            // If the current quantity is more than 1, decrease the quantity by 1
            $deleteQuery = "UPDATE tblusercart SET dItemQuantity = dItemQuantity - 1 WHERE dItemCode = '$itemCode' LIMIT 1";
        }

        // Execute the delete query
        $deleteResult = mysqli_query($conn, $deleteQuery);

        // Check if the deletion was successful
        if ($deleteResult) {
            // Redirect back to the checkout page with a success message
            setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: checkout.php');
            exit;
        } else {
            // Redirect back to the checkout page with an error message
            setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: checkout.php');
            exit;
        }
    } else {
        // Handle the case where the select query failed or no rows were returned
        setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: checkout.php');
        exit;
    }
}


    // Check if the removeAllQuantity button was clicked
    if (isset($_POST['removeAllQuantity'])) {
        // Retrieve the item code from the form
        $itemCode = $_POST['itemCode'];

        // Construct the delete query to remove all entries with the matching item code
        $deleteQuery = "DELETE FROM tblusercart WHERE dItemCode = '$itemCode'";

        // Execute the delete query
        $deleteResult = mysqli_query($conn, $deleteQuery);

        // Check if the deletion was successful
        if ($deleteResult) {
            // Redirect back to edit_item.php with a success message
         setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
         header('Location: checkout.php');
         exit;
         } else {
              // Redirect back to edit_item.php with an error message
         setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
         header('Location: checkout.php');
         exit;
         }
    }
?>
