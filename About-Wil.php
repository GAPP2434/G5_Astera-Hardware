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
                                        <h1>William Shim Albaran</h1>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            Who is William Shim Albaran?
                                        </h3>
                                        <p>Despite being born into a wealthy family, William Shim Albaran never let privilege define him. Raised with a strong sense of responsibility and independence, he understood the importance of forging his own path in life. While his family's financial success could have easily led to a life of luxury and idleness, William chose a different route.</p>
                                        <p>Driven by his desire to learn and succeed on his own merits, William immersed himself in the study of business and entrepreneurship. Armed with knowledge and ambition, he eagerly entered the working world, determined to make his mark. It was during this time that fate led him to cross paths with Gio Alexander Petalcurin, a self-made entrepreneur whose story resonated deeply with William.</p>
                                        <p>Recognizing an opportunity to learn from someone who embodied the values of hard work and determination, William sought to befriend Gio and work under his mentorship. Inspired by Gio's journey from humble beginnings to business success, William knew that by aligning himself with such a driven and visionary individual, he could gain invaluable experience and insight into the world of entrepreneurship. And so, their paths converged, setting the stage for a partnership that would shape both of their destinies.</p>
                                    </div>
                                    <div class="social">
                                        <a href="https://www.facebook.com/WilliamShimAlbaran" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="image-section">
                                    <img src="wilsuit.jpg" alt=""> 
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