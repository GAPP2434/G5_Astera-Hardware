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
                                        <h1>Mark Tranquilino Fajardo</h1>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            Who is Mark Tranquilino Fajardo?
                                        </h3>
                                        <p>Mark Tranquilino G. Fajardo's journey began with the innocence of childhood, excelling academically in his early years. However, the transition to high school proved tumultuous as he fell victim to negative influences, leading to a decline in his academic performance and a crisis of identity. With each passing year, Mark found himself drifting further from his true potential, trapped in a cycle of self-doubt and uncertainty.</p>
                                        <p>As adulthood beckoned, Mark realized the urgent need for change. Determined to break free from the grip of his past mistakes, he embarked on a journey of self-discovery and personal growth. Despite entering college with lingering doubts about his worthiness, Mark resolved to overcome his inner demons and rewrite the narrative of his life.</p>
                                        <p>It was a chance encounter with Gio Alexander Petalcurin that served as the catalyst for Mark's transformation. Inspired by Gio's unwavering belief in the power of self-belief and determination, Mark found renewed hope and purpose. Recognizing the opportunity for redemption and growth, he made the bold decision to join Gio's company, fueled by the belief that with the right mindset and guidance, he could achieve greatness.</p>
                                    </div>
                                    <div class="social">
                                        <a href="https://www.facebook.com/profile.php?id=100009413187551" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="image-section">
                                    <img src="marksuit.jpg" alt=""> 
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
</body>
 
</html>