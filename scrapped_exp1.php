<?php 
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}

include "dbcon.php";

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
        <?php include "navbar.html"?>
        <?php include "sidebar.html"?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
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
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header p-4">
                                <h1>Export</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Select columns to export:</h4>
                                    <form action="export.php" method="post">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dID" id="idCheckbox">
                                            <label class="form-check-label" for="idCheckbox">ID</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dUsername" id="usernameCheckbox">
                                            <label class="form-check-label" for="usernameCheckbox">Username</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dItemCode" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Item Code</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dType" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Type</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dQty_in" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Qty-In</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dQty_out" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Qty-Out</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dQty_total" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Qty-Total</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="columns[]" value="dDateAdded" id="itemCodeCheckbox">
                                            <label class="form-check-label" for="itemCodeCheckbox">Date-Added</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Export Selected Columns</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
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
    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
</html>
