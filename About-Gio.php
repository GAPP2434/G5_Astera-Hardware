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
        <?php include "sidebar.html"?>
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
                                        <h1>Gio Alexander Petalcurin</h1>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            Who is Gio Alexander Petalcurin?
                                        </h3>
                                        <p>Gio Alexander Petalcurin's journey to success is a testament to his hard work and determination. Starting from humble beginnings, Gio embarked on his entrepreneurial path by selling his services as a shoe polisher on the bustling streets. Despite facing numerous challenges and setbacks, Gio remained steadfast in his pursuit of a better future.</p>
                                        <p>With each shoe he polished, Gio saved diligently, determined to turn his modest earnings into something greater. His dedication and tireless work ethic soon caught the attention of those around him, earning him a reputation for reliability and excellence in his craft. Encouraged by the support of his community, Gio seized the opportunity to take his business to the next level.</p>
                                        <p>Fuelled by his ambition and unwavering commitment, Gio invested his hard-earned savings into building his own company. Through sheer grit and perseverance, he transformed his humble shoe polishing venture into a thriving business empire. Today, Gio's company stands as a testament to his resilience and unwavering determination, inspiring others to pursue their dreams with courage and tenacity.</p>
                                    </div>
                                    <div class="social">
                                        <a href="https://www.facebook.com/gioalexander.petalcurin" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="image-section">
                                    <img src="giosuit.JPG" alt=""> 
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
</body>
 
</html>