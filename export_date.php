<?php

include 'auth.php';
checkUserType('user', $conn);
// Include your database connection file
include 'dbcon.php';

// Start session
session_start();

// Set timezone
date_default_timezone_set("Asia/Hong_Kong");

// Get current date
$date = date("m/d/Y");
$datexx = date("Y-m-d");
$time = date("h:i:sa");

// Define file name for download
$file = "ITEM TRANSACTION LOGS_DATE_" . $date . ".xls";

// Set headers for Excel file download
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
?>
<style>
    td {
        text-align: center;
    }
</style>
<table border='1'>
    <thead>
        <tr>
            <th colspan='8'>ITEM TRANSACTION HISTORY LOGS</th>
        </tr>
        <tr style="font-weight:bold;">
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
    // Retrieve the selected date from the form
    $selectedDate = $_POST['Export_Date'];

    // Convert selected date to MySQL date format
    $selectedDate = date('Y-m-d H:i:s', strtotime($selectedDate));

    // Query to fetch item transaction history based on the selected date
    $query = mysqli_query($conn, "SELECT * FROM tblitemhistory WHERE DATE(dDateAdded) = '$selectedDate'");

    while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $row['dID']; ?></td>
            <td><?php echo $row['dUsername']; ?></td>
            <td><?php echo $row['dItemCode']; ?></td>
            <td><?php echo $row['dType']; ?></td>
            <td><?php echo $row['dQty_in']; ?></td>
            <td><?php echo $row['dQty_out']; ?></td>
            <td><?php echo $row['dQty_total']; ?></td>
            <td><?php echo $row['dDateAdded']; ?></td>
        </tr>
    <?php } ?>
</table>