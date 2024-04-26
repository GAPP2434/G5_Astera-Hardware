<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);

session_start();
date_default_timezone_set("Asia/Hong_Kong");
$date=date("m/d/Y");
$datexx=date("Y-m-d");
$time = date("h:i:sa");

$file = "ITEM TRANSACTION LOGS_".$date.".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
?>
<style>
    td{
        text-align:center;
    }

</style>
<table border = '1'>
    <thead>
        <tr>
            <th colspan = '8'>ITEM TRANSACTION HISTORY LOGS</th>
        </tr>
        <tr style="font-weight: bold;">
            <th>ID</th>
            <th>Username</th>
            <th>Item Code</th>
            <th>Type</th>
            <th>Quantity In</th>
            <th>Quantity Out</th>
            <th>Quantity Total</th>
            <th>Date Added</th>
        </tr>
    </thead>
    <?php
        $query = mysqli_query($conn, "SELECT * FROM tblitemhistory");
        while($rowx6 = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $rowx6['dID'];?></td>
                <td><?php echo $rowx6['dUsername'];?></td>
                <td><?php echo $rowx6['dItemCode'];?></td>
                <td><?php echo $rowx6['dType'];?></td>
                <td><?php echo $rowx6['dQty_in'];?></td>
                <td><?php echo $rowx6['dQty_out'];?></td>
                <td><?php echo $rowx6['dQty_total'];?></td>
                <td><?php echo $rowx6['dDateAdded'];?></td>
            </tr>
        <?php } ?>
</table>
