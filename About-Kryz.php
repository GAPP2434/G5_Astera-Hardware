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
    <link rel="stylesheet" href="members.css">
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
                    
                        <div class="session">
                            <div class="container">
                                <div class="content-section">
                                    <div class="title">
                                        <h1>Kristian Kenneth Garcia</h1>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            Who is Kristian Kenneth Garcia?
                                        </h3>
                                        <p>Kristian Garcia's early years were marked by the harsh realities of poverty, as he navigated the streets in search of survival. It was during one of these tumultuous moments that he crossed paths with Gio Alexander Petalcurin, a figure whose resilience and determination left an indelible mark on Kristian's spirit. Witnessing Gio's relentless pursuit of a better life despite the odds, Kristian couldn't help but be inspired by his unwavering resolve.</p>
                                        <p>Inquiring about Gio's motivations, Kristian was met with a simple yet profound response: the desire to break free from the shackles of poverty and turn dreams into reality. This conversation sparked a fire within Kristian, igniting a newfound determination to carve out his own path to success. With Gio as his unwitting mentor, Kristian embarked on a journey of self-improvement, channeling his energies into education and personal development.</p>
                                        <p>Years later, fate intervened once again as Kristian found himself face to face with Gio, now a successful entrepreneur. Remembering their chance encounter and the impact it had on his life, Kristian seized the opportunity to reconnect with his old acquaintance. Drawn by a sense of gratitude and admiration, Kristian made the decision to join forces with Gio, eager to contribute his newfound skills and knowledge to their shared pursuit of success.</p>
                                    </div>
                                    <div class="social">
                                        <a href="https://www.facebook.com/profile.php?id=100009545327801" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="image-section">
                                    <img src="kryzstollens.gif" alt=""> 
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
            <center>
            <div class="footer" style = "width: 70%;">
                <div class="container-fluid">
                    <div class="row" >
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
            </center>
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
 
</html>