<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);

date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

// Check if the form is submitted
if (isset($_POST['item_edit'])) {
    // Retrieve data from the form
    $itemCode = $_POST['Item_Code'];
    $itemName = $_POST['Item_Name'];
    $itemBrand = $_POST['Item_Brand'];
    $itemModel = $_POST['Item_Model'];
    $itemQty = $_POST['Item_Qty'];
    $itemPrice = $_POST['Item_Price'];
    $update_date = $_POST['Register_Date'];

    // Update tblmasterlist with the new data
    $updateMasterList = mysqli_query($conn, "UPDATE `tblmasterlist` SET `dItemName`='$itemName',
    `dItemBrand`='$itemBrand',`dItemModel`='$itemModel',`dItemQuantity`='$itemQty',`dItemPrice`='$itemPrice',`dDateAdded`='$update_date' WHERE dItemCode = '$itemCode'");
    $updateItemHistory = mysqli_query($conn, "INSERT INTO `tblitemhistory`(`dUsername`, `dItemCode`, `dType`, `dQty_in`, `dQty_out`, `dQty_total`, `dDateAdded`) 
    VALUES ('$username','$itemCode','UPDATE','0','0','$itemQty','$update_date')");

    // Execute both queries
    if ($updateMasterList && $updateItemHistory) {
        // Redirect back to edit_item.php with a success message
        setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: edit_item.php');
        exit;
    } else {
        // Redirect back to edit_item.php with an error message
        setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: edit_item.php');
        exit;
    }
}
?>
