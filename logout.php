<?php
include 'dbcon.php';

session_start(); // Start the session
    
    if(isset($_POST['logout'])){
        date_default_timezone_set('Asia/Manila');
        $currentdate = date('Y-m-d H:i:s');

        // Insert logout history
        $username = $_SESSION['username']; // Get the username from the session
        $insertLog = mysqli_query($conn, "INSERT INTO `tbllogs`(`dUsername`, `dType`, `dRemark`, `dDate`) 
                    VALUES ('$username', 'User', 'LOGOUT', '$currentdate')");

        // Unset and destroy the session
        unset($_SESSION['username']);
        session_destroy();

        // Redirect to the login page
        header('location: login.html');
        exit(); // Ensure no further code execution after redirection
    }

?>