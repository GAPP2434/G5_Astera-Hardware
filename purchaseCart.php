<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
    exit; // Make sure to exit after redirecting
}

include "dbcon.php";
date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

// Fetch items from tblusercart
$cartQuery = "SELECT * FROM tblusercart";
$cartResult = mysqli_query($conn, $cartQuery);

// Initialize an associative array to store cart items
$cartItems = array();

// Check if there are items in the cart
if (mysqli_num_rows($cartResult) > 0) {
    while ($cartRow = mysqli_fetch_assoc($cartResult)) {
        $itemCode = $cartRow['dItemCode'];
        $itemQuantity = $cartRow['dItemQuantity'];

        // Fetch item details from tblmasterlist
        $itemQuery = "SELECT * FROM tblmasterlist WHERE dItemCode = '$itemCode'";
        $itemResult = mysqli_query($conn, $itemQuery);
        $itemRow = mysqli_fetch_assoc($itemResult);
        $itemName = $itemRow['dItemName'];
        $itemBrand = $itemRow['dItemBrand'];
        $itemPrice = $itemRow['dItemPrice'];

        // Calculate total price for the current item
        $itemTotalPrice = $itemQuantity * $itemPrice;

        // Add or update the item in the cartItems array
        if (array_key_exists($itemCode, $cartItems)) {
            // If item code exists, update quantity and total price
            $cartItems[$itemCode]['quantity'] += $itemQuantity;
            $cartItems[$itemCode]['totalPrice'] += $itemTotalPrice;
        } else {
            // If item code doesn't exist, add it to the cartItems array
            $cartItems[$itemCode] = array(
                'name' => $itemName,
                'brand' => $itemBrand,
                'quantity' => $itemQuantity,
                'totalPrice' => $itemTotalPrice
            );
        }
    }
}

// Check if the purchase button has been pressed
if (isset($_POST['purchase'])) {
    // Fetch the total price of items in the cart
    $totalPrice = calculateTotalPrice($cartItems);

    // Fetch the current balance of the user
    $balanceQuery = "SELECT dBalance FROM testtable WHERE dUsername = '$username'";
    $balanceResult = mysqli_query($conn, $balanceQuery);

    // Check if the query was successful
    if ($balanceResult) {
        // Fetch the balance from the result
        $row = mysqli_fetch_assoc($balanceResult);
        $balance = $row['dBalance'];

        // Calculate the new balance after deducting the total price
        $newBalance = $balance - $totalPrice;

        // Update the user's balance in the database
        $updateBalanceQuery = "UPDATE testtable SET dBalance = $newBalance WHERE dUsername = '$username'";
        $updateBalanceResult = mysqli_query($conn, $updateBalanceQuery);

        if ($updateBalanceResult) {
            // Clear the user's cart by deleting all entries from tblusercart
            $clearCartQuery = "DELETE FROM tblusercart";
            $clearCartResult = mysqli_query($conn, $clearCartQuery);

            if ($clearCartResult) {
            // Redirect back to edit_item.php with a success message
            setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: checkout.php');
            exit;
            } else {
                setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
                header('Location: checkout.php');
                exit;
            }
        } else {
            setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
            header('Location: checkout.php');
            exit;
        }
    } else {
        setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: checkout.php');
        exit;
    }
} else {
    setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
    header('Location: checkout.php');
    exit;
}

function calculateTotalPrice($cartItems)
{
    $totalPrice = 0;

    // Loop through each item in the cartItems array
    foreach ($cartItems as $itemCode => $item) {
        // Add the item's total price to the overall total
        $totalPrice += $item['totalPrice'];
    }

    return $totalPrice;
}

// Close the database connection
mysqli_close($conn);
?>
