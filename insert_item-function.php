<?php
include 'dbcon.php';
session_start();
date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');
$username = $_SESSION['username'];

if(isset($_POST['item_register'])){
    $itemcode = $_POST['Item_Code'];
    $itemname = $_POST['Item_Name'];
    $itembrand = $_POST['Item_Brand'];
    $itemmodel = $_POST['Item_Model'];
    $itemqty = $_POST['Item_Qty'];
    $itemprice = $_POST['Item_Price'];
    $date_reg = $_POST['Register_Date'];

    // Check if the Item_Code and Item_Brand already exist in the table
    $checkExisting = mysqli_query($conn, "SELECT * FROM `tblmasterlist` WHERE `dItemCode` = '$itemcode'");
    if(mysqli_num_rows($checkExisting) > 0){
        // Item already exists, handle accordingly (redirect or display an error message)
        setcookie('item_exists', 'true', time() + 60, '/');
        header('Location: insert_item.php');
        exit(); // Stop further execution
    }
    
    if ($itemqty >= 0){
        $register = mysqli_query($conn, "INSERT INTO `tblmasterlist`(`dItemCode`, `dItemName`, `dItemBrand`, `dItemModel`, `dItemQuantity`, `dItemPrice`, `dDateAdded`) 
        VALUES ('$itemcode','$itemname','$itembrand','$itemmodel','$itemqty','$itemprice','$date_reg')");
        $add = mysqli_query($conn, "INSERT INTO `tblitemhistory`(`dUsername`, `dItemCode`, `dType`, `dQty_in`, `dQty_out`, `dQty_total`, `dDateAdded`) 
        VALUES ('$username','$itemcode','REGISTER','$itemqty','0','$itemqty','$date_reg')");
        setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: insert_item.php');
    }   
    else{
        setcookie('error', 'true', time() + 60, '/');
        header('Location: insert_item.php'); // Redirect to the insert item page with an error message
        exit(); // Stop further execution
    }
}
?>
