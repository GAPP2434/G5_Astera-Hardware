<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}

include 'dbcon.php'; // Include the database connection file

date_default_timezone_set('Asia/Manila');
$currentdate = date('Y-m-d H:i:s');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any columns were selected
    if(isset($_POST['columns']) && !empty($_POST['columns'])) {
        // Columns selected by the user
        $selectedColumns = $_POST['columns'];

        // Establish database connection using the $conn variable from dbcon.php
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Sanitize column names to prevent SQL injection
        $sanitizedColumns = array_map(function($column) use ($conn) {
            return mysqli_real_escape_string($conn, $column);
        }, $selectedColumns);

        // Construct the SQL query with sanitized column names
        $queryColumns = implode(", ", $sanitizedColumns);
        
        // Construct the SQL query
        $query = "SELECT $queryColumns FROM tblitemhistory";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result) {
            // Set headers for CSV download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Fetch and output column headers
            $columnHeaders = array_map('ucfirst', $selectedColumns);
            fputcsv($output, $columnHeaders);

            // Fetch and output data rows
            while ($row = mysqli_fetch_assoc($result)) {
                fputcsv($output, $row);
            }

            // Close output stream
            fclose($output);
            exit;
        } else {
            // Query failed
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // No columns selected
        echo "Please select at least one column to export.";
    }
} else {
    // Redirect if accessed directly
    header("Location: your_page.php");
    exit;
}
?>