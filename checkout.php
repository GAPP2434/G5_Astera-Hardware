<?php
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Removed!") </script>
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
                                <h2 class="pageheader-title">E-commerce Product Checkout </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                    
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-inline-block">
                                                    <h5 class="text-muted">Total Earned</h5>
                                                    <h2 class="mb-0"> $149.00</h2>
                                                </div>
                                                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                                    <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Product Checkout</li>
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
                                            <h4 class="mb-0">Billing address</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="needs-validation" novalidate="">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">First name</label>
                                                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                                        <div class="invalid-feedback">
                                                            Valid first name is required.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Last name</label>
                                                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                                        <div class="invalid-feedback">
                                                            Valid last name is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username">Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">@</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                                        <div class="invalid-feedback" style="width: 100%;">
                                                            Your username is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                                    <div class="invalid-feedback">
                                                        Please enter a valid email address for shipping updates.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your shipping address.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label for="country">Country</label>
                                                        <select class="custom-select d-block w-100" id="country" required="">
                                                            <option value="">Choose...</option>
                                                            <option>United States</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a valid country.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="state">State</label>
                                                        <select class="custom-select d-block w-100" id="state" required="">
                                                            <option value="">Choose...</option>
                                                            <option>California</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid state.
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="zip">Zip</label>
                                                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                                                        <div class="invalid-feedback">
                                                            Zip code required.
                                                        </div>
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
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Cart-->
                                <div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-header">
            <h4 class="d-flex justify-content-between align-items-center mb-0">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
        </div>
        <div class="card-body">
            <ul class="list-group mb-3">
                <?php
                include "dbcon.php";

                // Function to handle removing items from the cart
                function removeFromCart($itemCode)
                {
                    global $conn;
                    $deleteQuery = "DELETE FROM tblusercart WHERE dItemCode = '$itemCode'";
                    $deleteResult = mysqli_query($conn, $deleteQuery);
                    if ($deleteResult) {
                        return true; // Item removed successfully
                    } else {
                        return false; // Error occurred while removing item
                    }
                }

                // Fetch items from tblusercart
                $cartQuery = "SELECT * FROM tblusercart";
                $cartResult = mysqli_query($conn, $cartQuery);

                // Initialize an associative array to store cart items
                $cartItems = array();

                // Check if there are items in the cart
                if (mysqli_num_rows($cartResult) > 0) {
                    while ($cartRow = mysqli_fetch_assoc($cartResult)) {
                        $itemCode = $cartRow['dItemCode'];
                        $itemQuantity = $cartRow['dItemQuantity'];

                        // Fetch item details from tblmasterlist
                        $itemQuery = "SELECT * FROM tblmasterlist WHERE dItemCode = '$itemCode'";
                        $itemResult = mysqli_query($conn, $itemQuery);
                        $itemRow = mysqli_fetch_assoc($itemResult);
                        $itemName = $itemRow['dItemName'];
                        $itemBrand = $itemRow['dItemBrand'];
                        $itemPrice = $itemRow['dItemPrice'];

                        // Calculate total price for the current item
                        $itemTotalPrice = $itemQuantity * $itemPrice;

                        // Add or update the item in the cartItems array
                        if (array_key_exists($itemCode, $cartItems)) {
                            // If item code exists, update quantity and total price
                            $cartItems[$itemCode]['quantity'] += $itemQuantity;
                            $cartItems[$itemCode]['totalPrice'] += $itemTotalPrice;
                        } else {
                            // If item code doesn't exist, add it to the cartItems array
                            $cartItems[$itemCode] = array(
                                'name' => $itemName,
                                'brand' => $itemBrand,
                                'quantity' => $itemQuantity,
                                'totalPrice' => $itemTotalPrice
                            );
                        }
                    }

                    // Display items
                    foreach ($cartItems as $itemCode => $item) {
                ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6 class="my-0"><?php echo $item['name']; ?></h6>
                                <small class="text-muted"><?php echo $item['brand']; ?></small>
                                <span class="text-muted">Quantity: <?php echo $item['quantity']; ?></span>
                            </div>
                            <span class="text-muted">₱<?php echo $item['totalPrice']; ?></span>
                            <div class="d-flex">
                                <!-- Remove one button -->
                                <form method="post" action="removeFromCart.php">
                                    <input type="hidden" name="itemCode" value="<?php echo $itemCode; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm mr-1" name="removeSingleQuantity" onclick="return confirm('Are you sure?')">-</button>
                                </form>
                                <!-- Remove all button -->
                                <form method="post" action="removeFromCart.php">
                                    <input type="hidden" name="itemCode" value="<?php echo $itemCode; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="removeAllQuantity" onclick="return confirm('Are you sure?')">x</button>
                                </form>
                            </div>
                        </li>
                <?php
                    }
                } else {
                    // If cart is empty, display a message
                ?>
                    <li class="list-group-item">Your cart is empty</li>
                <?php
                }
                ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (PHP)</span>
                    <strong>₱<?php echo calculateTotalPrice($cartItems); ?></strong>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
// Function to calculate the total price from cart items
function calculateTotalPrice($cartItems)
{
    $totalPrice = 0;

    // Loop through each item in the cartItems array
    foreach ($cartItems as $itemCode => $item) {
        // Add the item's total price to the overall total
        $totalPrice += $item['totalPrice'];
    }

    return $totalPrice;
}
?>





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