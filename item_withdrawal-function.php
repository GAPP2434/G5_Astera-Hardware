<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);

date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');
$itemcode = $_POST['Item_Code'];
$qty = $_POST['Item_Qty'];
$update_date = $_POST['Register_Date'];

if (isset($_POST['item_withdraw'])){
    $query = mysqli_query($conn, "SELECT * FROM tblmasterlist WHERE `dItemCode` = '$itemcode'");
        while ($rowx6 = mysqli_fetch_array($query)){
            $newqty = $rowx6['dItemQuantity'];
        }
        $total = $newqty - $qty;
    
    if ($total >= 0){
        $update = mysqli_query($conn, "UPDATE `tblmasterlist` SET `dItemQuantity`='$total' WHERE dItemCode = '$itemcode'");
        $inserthistory = mysqli_query($conn, "INSERT INTO `tblitemhistory`(`dUsername`, `dItemCode`, `dType`, `dQty_in`, `dQty_out`, `dQty_total`, `dDateAdded`) 
        VALUES ('$username', '$itemcode', 'WITHDRAW', '0', '$qty', '$total','$update_date')");
        /*$insertlogs = mysqli_query($conn, "INSERT INTO `tbllogs`(`dUsername`, `dType`, `dRemark`, `dDate`) VALUES ('$username','User', 'WITHDREW' , '$update_date')");*/
        setcookie('operation_status', 'success', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: item_withdrawal.php');
        exit;
    }
    else{
        setcookie('operation_status', 'error', time() + 60, '/'); // Cookie expires in 60 seconds
        header('Location: item_withdrawal.php');
        exit;
    }
}
?>