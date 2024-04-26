<?php 
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Edited!") </script>
    <?php 
    setcookie('operation_status', '', time() - 3600, '/');
}
if(isset($_COOKIE['error']) && $_COOKIE['error'] == 'true') {
    ?>
    <script> alert("There has been an error. Try again in a few minutes or contact an admin.") </script>
    <?php 
    setcookie('error', '', time() - 3600, '/');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="user-defined-css.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
       <?php include "navbar.php"?>
       <?php
            include "dbcon.php";
            // Fetch the user's type from the database
            $userTypeQuery = "SELECT dUserType FROM tblusers WHERE dUsername = '$username'";
            $userTypeResult = mysqli_query($conn, $userTypeQuery);

            if ($userTypeResult && mysqli_num_rows($userTypeResult) > 0) {
                $row = mysqli_fetch_assoc($userTypeResult);
                $userType = $row['dUserType'];

                // Include the appropriate sidebar based on user type
                if ($userType === "user") {
                    include "user-sidebar.html";
                } elseif ($userType === "admin") {
                    include "sidebar.html";
                } else {
                    // Handle the case where user type is neither User nor Admin
                    echo "Unknown user type";
                }
            } else {
                // Handle the case where user type retrieval failed or user not found
                echo "Error fetching user type";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Export Files</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Logs</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Export Files</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                <h1>Export Files</h1>
            </div>
            <div class="card-body">
                <form method="post" action="export_function.php">
        <!-- Your form fields here -->
        
        <!-- Button -->
        <h4><u>&nbsp&nbspExport All&nbsp&nbsp</u></h4>
                <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure?')" style="border-radius: 10%;width: 15%;">Export as XLS</button>
            </form>
            <form method="post" action="export_pdf.php">
                <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure?')" style="border-radius: 10%;margin-top: 1.5% ; width: 15%;">Export as PDF</button>
            </form>
        <hr>
        <h4><u>&nbsp&nbspExport By Item&nbsp&nbsp</u></h4>
        <form method="post" action="export_item.php">
        <div>
        <select id="inputSelect" class="form-control" name="Item_Code" required>
                                <option value="">Select Item Code</option>
                                <?php
                                // Include your database connection code here
                                include 'dbcon.php';

                                // Fetch all item data from tblmasterlist
                                $query = "SELECT * FROM tblmasterlist";
                                $result = mysqli_query($conn, $query);

                                // Check if there are any items
                                if(mysqli_num_rows($result) > 0) {
                                    // Loop through each item and generate an option
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Output item code as option value
                                        echo "<option value='" . $row['dItemCode'] . "' data-item-name='" . $row['dItemName'] . "' data-item-brand='" . $row['dItemBrand'] . "' data-item-model='" . $row['dItemModel'] . "' data-item-qty='" . $row['dItemQuantity'] . "' data-item-price='" . $row['dItemPrice'] . "'>" . $row['dItemCode'] . "</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>No items found</option>";
                                }
                                ?>
                            </select>
                        <div class="arrow-down" style="margin-top: 105px; margin-right: 20px;"></div>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure?')" style="border-radius: 10%; margin-top: 2%;width: 15%;">Export by Item</button>
                </form>
        <hr>
        <h4><u>&nbsp&nbspExport By Date&nbsp&nbsp</u></h4>   
        <form method="post" action="export_date.php"> 
        <div class="form-group">
                        <label for="inputText3" class="col-form-label">Date Added</label>
                        <input id="inputText3" type="date" class="form-control" name="Export_Date" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Are you sure?')" style="border-radius: 10%; margin-top: 2%;width: 15%;">Export by Date</button>        
        </div> 
        </div>
                </form>
            </div>
            <div class="card-footer bg-white" style = "width: 100%;">
                <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
            </div>
        </div>
    </div>
</div>
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>
