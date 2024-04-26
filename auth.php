<?php
session_start();

function checkUserType($redirectUserType, $conn) {
    $username = $_SESSION['username']; 

    // If user is not logged in, redirect to login page
    if (!isset($username)) {
        header("Location: login.html");
        exit;
    }

    // Check user type
    $query = "SELECT dUserType FROM tblusers WHERE BINARY dUsername = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $userType);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Redirect user based on user type
    if ($userType == $redirectUserType) {
        header("Location: homepage-user.php");
        exit;
    }
}

?>
