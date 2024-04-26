<?php 
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Exported!") </script>
    <?php 
    // Clear the cookie after displaying the message
    setcookie('operation_status', '', time() - 3600, '/');
}
if(isset($_COOKIE['error']) && $_COOKIE['error'] == 'true') {
    ?>
    <script> alert("There has been an error. Try again in a few minutes or contact an admin.") </script>
    <?php 
    // Clear the cookie after displaying the message
    setcookie('error', '', time() - 3600, '/');
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="user-defined-css.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <?php include "navbar.html"?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include "sidebar.html"?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Blank Pageheader </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blank Pageheader</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <h1>Edit Item</h1>
                            </div>
                            <div class="card-body">
                                <form method="post" action="edit_item-function.php">
                                    <div class="form-group">
                                        <label for="tableSelect">Select Table:</label>
                                        <select id="tableSelect" class="form-control" name="tableSelect" onchange="getColumns(this.value)" required>
                                            <option value="">Select Table</option>
                                            <?php
                                            // Modify this section to fetch table names from your database
                                            include 'dbcon.php';
                                            $tablesQuery = "SHOW TABLES";
                                            $tablesResult = mysqli_query($conn, $tablesQuery);
                                            while ($row = mysqli_fetch_row($tablesResult)) {
                                                echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div id="columnCheckboxes" style="display:none;">
                                        <label>Select Columns:</label><br>
                                        <!-- Column checkboxes will be inserted here dynamically -->
                                    </div>
                                    <button class="btn btn-primary" type="item_edit" name="item_edit" onclick="return confirm('Are you sure?')">Edit Item</button>
                                    <button class="btn btn-danger" type="reset" onclick="return confirm('Are you sure?')">Reset</button>
                                </form>
                            </div>
                            <div class="card-footer bg-white">
                                <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
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
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    function getColumns(tableName) {
        if (tableName === '') {
            document.getElementById('columnCheckboxes').style.display = 'none';
            return;
        }
        // AJAX request to fetch column names for the selected table
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse JSON response
                    var columns = JSON.parse(xhr.responseText);
                    var checkboxes = '';
                    for (var i = 0; i < columns.length; i++) {
                        checkboxes += '<input type="checkbox" name="columns[]" value="' + columns[i] + '"> ' + columns[i] + '<br>';
                    }
                    // Display checkboxes
                    document.getElementById('columnCheckboxes').innerHTML = checkboxes;
                    document.getElementById('columnCheckboxes').style.display = 'block';
                } else {
                    console.error('Error fetching columns: ' + xhr.status);
                }
            }
        };
        xhr.open('GET', 'get_columns.php?table=' + tableName, true);
        xhr.send();
    }
    </script>
</body>
</html>