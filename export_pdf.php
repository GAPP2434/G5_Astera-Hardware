<?php
include 'auth.php';
checkUserType('user', $conn);

require_once('tcpdf/tcpdf.php');
include 'dbcon.php';

// Fetch data from tblitemhistory
$query = mysqli_query($conn, "SELECT * FROM tblitemhistory");

// Create new PDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Item Transaction History Logs');
$pdf->SetSubject('Item Transaction History Logs');

// Add a page
$pdf->AddPage();

// Set table header
$html = '<table border="1" style="text-align:center;">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th colspan = "8"  style="border:2px solid black;"><Strong>ITEM TRANSACTION HISTORY LOGS</Strong></th>';
$html .= '</tr>';
$html .= '<tr style="font-weight:bold">';
$html .= '<th>ID</th>';
$html .= '<th>Username</th>';
$html .= '<th>Item Code</th>';
$html .= '<th>Type</th>';
$html .= '<th>Quantity In</th>';
$html .= '<th>Quantity Out</th>';
$html .= '<th>Quantity Total</th>';
$html .= '<th>Date Added</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';


// Fetch data and add it to the PDF
while($row = mysqli_fetch_assoc($query)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['dID'] . '</td>';
    $html .= '<td>' . $row['dUsername'] . '</td>';
    $html .= '<td>' . $row['dItemCode'] . '</td>';
    $html .= '<td>' . $row['dType'] . '</td>';
    $html .= '<td>' . $row['dQty_in'] . '</td>';
    $html .= '<td>' . $row['dQty_out'] . '</td>';
    $html .= '<td>' . $row['dQty_total'] . '</td>';
    $html .= '<td>' . $row['dDateAdded'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF to browser
$pdf->Output('item_transaction_history.pdf', 'D');

?>