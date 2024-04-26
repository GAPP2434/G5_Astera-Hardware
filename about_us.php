<?php
include 'dbcon.php';
include 'auth.php';
checkUserType('user', $conn);
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
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container">
                            <h1 class="heading2"> About Us</h1>
                            <p class="description">Welcome to our "Monster Hunter World" themed appliance store, where we're dedicated to providing top-quality tools for your home. Inspired by the adventure and precision of the game, we offer a unique selection of appliances designed to enhance your home experience. From kitchen essentials to home gadgets, we've got everything you need for a satisfying home life. Join us on a journey of discovery and innovation – welcome to our store.</p>
                            <div class="line"></div>
                            <h1 class="heading"> MEMBERS</h1> <!-- Move the header above the card-wrapper -->
                            <div class="card-wrapper">
                                <div class="card">
                                    
                                    <a href="About-Mark.php"><img src="maruku.jpg" alt="Mark Fajardo" class="profile-img"></a>
                                    <center><h1>Mark Fajardo</h1></center>
                                    <p class="job-title">CMO</p>
                                    <p class="contact"><b>+63 954-962-7319</b></p>
                                    
                                </div>
                                <div class="card">
                                   
                                    <a href="About-Wil.php"><img src="wil.jpg" alt="William Albaran" class="profile-img"></a>
                                    <center><h1>William Albaran</h1></center>
                                    <p class="job-title">Director</p>
                                    <p class="contact"><b>+63 946-973-5803</b></p>
                                    
                                </div>
                                <div class="card">
                                    
                                    <a href="About-Gio.php"><img src="gio.jpg" alt="Gio Petalcurin" class="profile-img"></a>
                                    <center><h1>Gio Petalcurin</h1></center>
                                    <p class="job-title">President</p>
                                    <p class="contact"><b>+63 944-728-5139</b></p>
                                    
                                </div>
                                <div class="card">
                                    
                                    <a href="About-Kryz.php"><img src="kryzclass.jpg" alt="Kristian Garcia" class="profile-img"></a>
                                    <center><h1>Kristian Garcia</h1></center>
                                    <p class="job-title">CIO</p>
                                    <p class="contact"><b>+63 911-975-4626</b></p>
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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</body>
 
</html>