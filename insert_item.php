<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);


// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Registered!") </script>
    <?php 
    // Clear the cookie after displaying the message
    setcookie('operation_status', '', time() - 3600, '/');
}
if(isset($_COOKIE['item_exists']) && $_COOKIE['item_exists'] == 'true') {
    ?>
    <script> alert("Item Already Exsists!") </script>
    <?php 
    // Clear the cookie after displaying the message
    setcookie('item_exists', '', time() - 3600, '/');
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
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <?php include "navbar.php"?>
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
                            <h2 class="pageheader-title">Astera Hardware Masterlist (INSERT)</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Astera Hardware Masterlist (INSERT)</li>
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
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                     <h1>Insert Item<h1>
                                </div>
                                <form method = "post" action = "insert_item-function.php"> 
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Item Code</label>
                                        <input id="inputText3" type="text" class="form-control" name="Item_Code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Item Name</label>
                                        <input id="inputText3" type="text" class="form-control" name="Item_Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Item Brand</label>
                                        <input id="inputText3" type="text" class="form-control" name="Item_Brand" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Item Model</label>
                                        <input id="inputText3" type="text" class="form-control" name="Item_Model" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Quantity</label>
                                        <input id="inputText3" type="number" class="form-control" step = "1" name="Item_Qty" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Price</label>
                                        <input id="inputText3" type="number" class="form-control" name="Item_Price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Date Added</label>
                                        <input id="inputText3" type="datetime-local" class="form-control"name="Register_Date"  required>
                                    </div>
                                    <div style = "display: inline-block;">
                                        <button class="btn btn-primary" type="item_register" name="item_register" onclick = "return confirm('Are you sure?')" >Register Item</button>
                                        <button class="btn btn-danger" type="reset" onclick = "return confirm('Are you sure?')">Reset</button>
                                    </div>
                                </div>
                                </form>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div>
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
</body>
</html>