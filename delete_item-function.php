<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);

date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

if(isset($_POST['delete_item'])){
    $itemcode = $_POST['item_code'];
    $date_reg = $_POST['date_added'];
    $delete = mysqli_query($conn, "DELETE FROM `tblmasterlist` WHERE dItemCode = '$itemcode'");
    $add = mysqli_query($conn, "INSERT INTO `tblitemhistory`(`dUsername`, `dItemCode`, `dType`, `dQty_in`, `dQty_out`, `dQty_total`, `dDateAdded`) 
    VALUES ('$username','$itemcode','DELETE','0','0','0','$date_reg')");
    setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
    header('Location: delete_item.php');  
}
else{
    setcookie('error', 'true', time() + 60, '/');
    header('Location: delete_item.php'); // Redirect to the insert item page with an error message
    exit(); // Stop further execution
}
?>
