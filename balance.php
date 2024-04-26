<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Added Balance!") </script>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include "navbar.php";?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include "user-sidebar.html";?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Balance</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12" style = "right: 0; position: absolute; margin-top: -3em; margin-right: 15.5em; ">
                                            <div class="card" style = "width: 92%;">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h5 class="text-muted">Total Earned</h5>
                                                        <?php
                                                        // Include your database connection file
                                                        include "dbcon.php";

                                                        // Query to fetch the balance for the logged-in user
                                                        $balanceQuery = "SELECT dBalance FROM tblusers WHERE dUsername = '$username'";
                                                        $balanceResult = mysqli_query($conn, $balanceQuery);

                                                        // Check if the query was successful
                                                        if ($balanceResult) {
                                                            // Fetch the balance from the result
                                                            $row = mysqli_fetch_assoc($balanceResult);
                                                            $balance = $row['dBalance'];

                                                            // Display the balance
                                                            echo '<h2 class="mb-0">₱' . $balance . '</h2>';
                                                        } else {
                                                            // Handle the case where the query failed
                                                            echo "Error: " . mysqli_error($conn);
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>    
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Balance</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="mb-0">Add Balance</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="needs-validation" method="post" action="addBalance.php" novalidate>
                                                <div class="mb-3">
                                                    <label for="amount">Amount</label>
                                                    <input type="text" class="form-control" name="amount" id="amount" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the amount.
                                                    </div>
                                                </div>
                                                <hr class="mb-4">
                                                <h4 class="mb-3">Payment</h4>
                                                <div class="d-block my-3">
                                                    <div class="custom-control custom-radio">
                                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                                        <label class="custom-control-label" for="credit">Credit card</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                                        <label class="custom-control-label" for="debit">Debit card</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                                        <label class="custom-control-label" for="paypal">PayPal</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="cc-name">Name on card</label>
                                                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                                        <small class="text-muted">Full name as displayed on card</small>
                                                        <div class="invalid-feedback">
                                                            Name on card is required
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="cc-number">Credit card number</label>
                                                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Credit card number is required
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="cc-expiration">Expiration</label>
                                                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Expiration date required
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="cc-cvv">CVV</label>
                                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Security code required
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" name = "addBalance">Add Balance</button>
                                            </form>
                                        </div>
                                    </div>
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
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js-->
    <script src="assets/libs/js/main-js.js"></script>
</body>

 
</html>