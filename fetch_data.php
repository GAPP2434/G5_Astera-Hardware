<?php
// Include the database connection file
include 'dbcon.php';

$query = "SELECT dItemCode, dType, dQty_in, dQty_out, dQty_total, dDateAdded, dUsername FROM tblitemhistory ORDER BY dDateAdded DESC";
$result = mysqli_query($conn, $query);
$data = [];
while($row = mysqli_fetch_assoc($result)) {
    $data[] = array_values($row); // Convert associative array to indexed array
}
echo json_encode($data);
?>
