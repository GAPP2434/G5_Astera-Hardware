<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Added to Cart!") </script>
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
<style>

 img{
    height: 100%;
    width: 80%;
 }
 .product-thumbnail {
    height:95%;
 }


</style>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include "navbar.php"; ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include "user-sidebar.html"; ?>
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
                                <h2 class="pageheader-title">Astera Hardware Store </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Concept - Bootstrap 4 Admin Dashboard Template</li>
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
                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head ">
                                            <div class="product-img">
                                                <img src="G5-images/CLAW-HAMMER -HICKORY.jpg" alt="" class="img-fluid"></div>
                                            <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Ace Claw Hammer'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱499.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput1')">
                                                    <input type="hidden" name="itemCode" value="4523"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput1">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <form method="post" action="product-single.php">
                                                    <input type="hidden" name="itemCode" value="4523"> <!-- Hardcoded item code -->
                                                    <input type="submit" class="btn btn-outline-light" value="Details">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Item-->
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/ACE-LONG-NOSE-PLIERS.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Ace Long Nose Pliers'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱259.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput2')">
                                                    <input type="hidden" name="itemCode" value="3211"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput2">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=3211" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                <!--Item-->
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Ball Pien Hammer.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Ball Pien Hammer'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱1672.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput3')">
                                                    <input type="hidden" name="itemCode" value="4216"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput3">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=4216" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Carbon Steel Hammer Hachet.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Carbon Steel Hammer Hatchet'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱1500.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput4')">
                                                    <input type="hidden" name="itemCode" value="2752"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput4">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=2752" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Mini Bolt Cutter Red.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Mini Bolt Cutter Red'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱1000.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput5')">
                                                    <input type="hidden" name="itemCode" value="1960"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput5">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=1960" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Cordless Brushed 2 Tool Drill and Impact Driver Kit.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Tool Drill Impact Driver Kit'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>Milwaukee</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱6500.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput6')">
                                                    <input type="hidden" name="itemCode" value="3211"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput6">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=3021" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Cowhide Welding Gloves Gray.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Cowhide Welding Gloves Gray'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>Forney</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱500.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput7')">
                                                    <input type="hidden" name="itemCode" value="5809"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput7">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=5809" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Anti-Scratch Safety Glasses.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Anti-Scratch Safety Glasses'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱300.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput8')">
                                                    <input type="hidden" name="itemCode" value="2853"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput8">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=2853" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Pocket Nylon Work Belt.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Pocket Nylon Work Belt '";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>Milwaukee</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱5500.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput9')">
                                                    <input type="hidden" name="itemCode" value="5673"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput9">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=5673" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Torch Head.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Torch Head'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>ACE</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱750.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput10')">
                                                    <input type="hidden" name="itemCode" value="2192"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput10">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=2192" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Corded Soldering Iron Kit.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Corded Soldering Iron Kit '";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>Weller</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱400.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput11')">
                                                    <input type="hidden" name="itemCode" value="1287"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput11">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=1287" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                 <!--Item-->
                                 <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="G5-images/Corded Wet & Dry Vacuum.jpg" alt="" class="img-fluid"></div>
                                                <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <?php
                                                // Include database connection
                                                include "dbcon.php";

                                                // Fetch item name from tblmasterlist
                                                $itemNameQuery = "SELECT dItemName FROM tblmasterlist WHERE dItemName = 'Corded Wet & Dry Vacuum'";
                                                $itemNameResult = mysqli_query($conn, $itemNameQuery);
                                                $itemNameRow = mysqli_fetch_assoc($itemNameResult);
                                                $itemName = $itemNameRow['dItemName'];

                                                ?>
                                                <h3 class="product-title"><?php echo $itemName; ?></h3>
                                                <h4>Craftsman</h4>
                                                <div class="product-rating d-inline-block">
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    <i class="fa fa-fw fa-star"></i>
                                                </div>
                                                <div class="product-price">₱7500.00</div>
                                            </div>
                                            <div class="product-btn">
                                                <form method="post" action="addToCart.php" onsubmit="return confirmQuantity('quantityInput12')">
                                                    <input type="hidden" name="itemCode" value="7842"> <!-- Hardcoded item code -->
                                                    <input type="hidden" name="quantity" id="quantityInput12">
                                                    <button type="submit" class="btn btn-primary" name="addToCart">Add to Cart</button>
                                                </form>
                                                <a href="product-single.php?itemCode=7842" class="btn btn-outline-light">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Item-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link " href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="product-sidebar">
                                <div class="product-sidebar-widget">
                                    <h4 class="mb-0">E-Commerce Filter</h4>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Category</h4>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-1">
                                        <label class="custom-control-label" for="cat-1">Categories #1</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-2">
                                        <label class="custom-control-label" for="cat-2">Categories #2</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-3">
                                        <label class="custom-control-label" for="cat-3">Categories #3</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-4">
                                        <label class="custom-control-label" for="cat-4">Categories #4</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-5">
                                        <label class="custom-control-label" for="cat-5">Categories #5</label>
                                    </div>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Size</h4>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-1">
                                        <label class="custom-control-label" for="size-1">Small</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-2">
                                        <label class="custom-control-label" for="size-2">Medium</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-3">
                                        <label class="custom-control-label" for="size-3">Large</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-4">
                                        <label class="custom-control-label" for="size-4">Extra Large</label>
                                    </div>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Brand</h4>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-1">
                                        <label class="custom-control-label" for="brand-1">Brand Name #1</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-2">
                                        <label class="custom-control-label" for="brand-2">Brand Name #2</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-3">
                                        <label class="custom-control-label" for="brand-3">Brand Name #3</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-4">
                                        <label class="custom-control-label" for="brand-4">Brand Name #4</label>
                                    </div>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Color</h4>
                                    <div class="custom-control custom-radio custom-color-blue ">
                                        <input type="radio" id="color-1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="color-1">Blue</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-color-red ">
                                        <input type="radio" id="color-2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="color-2">Red</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-color-yellow ">
                                        <input type="radio" id="color-3" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="color-3">Yellow</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-color-black ">
                                        <input type="radio" id="color-4" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="color-4">Black</label>
                                    </div>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Price</h4>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="price-1">
                                        <label class="custom-control-label" for="price-1">$$</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="price-2">
                                        <label class="custom-control-label" for="price-2">$$$</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="price-3">
                                        <label class="custom-control-label" for="price-3">$$$$</label>
                                    </div>
                                </div>
                                <div class="product-sidebar-widget">
                                    <a href="#" class="btn btn-outline-light">Reset Filter</a>
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
        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="assets/libs/js/main-js.js"></script>
        <script>
            function confirmQuantity(inputId) {
                var quantity = prompt("Enter quantity:");
                if (quantity !== null && quantity !== "" && !isNaN(quantity) && parseInt(quantity) > 0) {
                    // If a valid quantity is entered, update the input value with the specified ID and allow form submission
                    document.getElementById(inputId).value = quantity;
                    return true;
                } else {
                    // If the user cancels or enters an invalid quantity, prevent form submission
                    alert("Please enter a valid quantity.");
                    return false;
                }
            }

        </script>

</body>
 
</html>