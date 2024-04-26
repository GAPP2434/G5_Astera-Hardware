<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}

include "dbcon.php";
date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

if (isset($_POST['addToCart'])) {
    $itemCode = $_POST['itemCode'];
    $quantity = $_POST['quantity'];

    // Fetch item details from the database based on the item code
    // Assuming you have a function to fetch item details from your database
    // Modify this according to your database structure and query method
    $query = "SELECT dItemName, dItemBrand, dItemPrice FROM tblmasterlist WHERE dItemCode = '$itemCode'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $itemName = $row['dItemName'];
        $itemBrand = $row['dItemBrand'];
        $itemPrice = $row['dItemPrice'];

        // Calculate total price
        $totalPrice = $itemPrice * $quantity;

        // Insert item into user's cart table
        $insertQuery = "INSERT INTO tblusercart (dItemCode, dItemName, dItemBrand, dItemQuantity, dItemPrice, dDate) VALUES ('$itemCode', '$itemName', '$itemBrand', '$quantity', '$totalPrice', '$currentdate')";
        $insertResult = mysqli_query($conn, $insertQuery);

        // Execute both queries
        if ($insertResult) {
            // Redirect back to edit_item.php with a success message
            setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: homepage-user.php');
            exit;
        } else {
            setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: homepage-user.php');
            exit;
        }
    }
}
?>
