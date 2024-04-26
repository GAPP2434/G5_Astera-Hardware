<?php 
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
}
// Check if the cookie indicating operation success exists
if(isset($_COOKIE['operation_status']) && $_COOKIE['operation_status'] == 'success') {
    ?>
    <script> alert("Successfully Edited!") </script>
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
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="user-defined-css.css">
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
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header p-4">
                <h1>Edit Item</h1>
            </div>
            <div class="card-body">
                <form method = "post" action = "edit_item-function.php">
                    <div class="form-group">
                        <div class="select-wrapper">
                            <select id="inputSelect" class="form-control" name="Item_Code" required>
                                <option value="">Select Item Code</option>
                                <?php
                                // Include your database connection code here
                                include 'dbcon.php';

                                // Fetch all item data from tblmasterlist
                                $query = "SELECT * FROM tblmasterlist";
                                $result = mysqli_query($conn, $query);

                                // Check if there are any items
                                if(mysqli_num_rows($result) > 0) {
                                    // Loop through each item and generate an option
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Output item code as option value
                                        echo "<option value='" . $row['dItemCode'] . "' data-item-name='" . $row['dItemName'] . "' data-item-brand='" . $row['dItemBrand'] . "' data-item-model='" . $row['dItemModel'] . "' data-item-qty='" . $row['dItemQuantity'] . "' data-item-price='" . $row['dItemPrice'] . "'>" . $row['dItemCode'] . "</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>No items found</option>";
                                }
                                ?>
                            </select>
                            <div class="arrow-down"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="itemName" class="col-form-label">Item Name</label>
                        <input id="itemName" type="text" class="form-control" name="Item_Name" required>
                    </div>
                    <div class="form-group">
                        <label for="itemBrand" class="col-form-label">Item Brand</label>
                        <input id="itemBrand" type="text" class="form-control" name="Item_Brand" required>
                    </div>
                    <div class="form-group">
                        <label for="itemModel" class="col-form-label">Item Model</label>
                        <input id="itemModel" type="text" class="form-control" name="Item_Model" required>
                    </div>
                    <div class="form-group">
                        <label for="itemQty" class="col-form-label">Quantity</label>
                        <input id="itemQty" type="number" class="form-control" step="1" name="Item_Qty" required>
                    </div>
                    <div class="form-group">
                        <label for="itemPrice" class="col-form-label">Price</label>
                        <input id="itemPrice" type="number" class="form-control" name="Item_Price" required>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Date Added</label>
                        <input id="inputText3" type="datetime-local" class="form-control" name="Register_Date" required>
                    </div>
                    <div style="display: inline-block;">
                        <button class="btn btn-primary" type="item_edit" name="item_edit" onclick="return confirm('Are you sure?')">Edit Item</button>
                        <button class="btn btn-danger" type="reset" onclick="return confirm('Are you sure?')">Reset</button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
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
    <script>
    // When an option is selected from the dropdown
    document.getElementById('inputSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value === '') return; // Skip if the selected option is the placeholder
        // Retrieve item data from the selected option's data attributes
        var itemName = selectedOption.dataset.itemName;
        var itemBrand = selectedOption.dataset.itemBrand;
        var itemModel = selectedOption.dataset.itemModel;
        var itemQty = selectedOption.dataset.itemQty;
        var itemPrice = selectedOption.dataset.itemPrice;
        // Update input fields with retrieved item data
        document.getElementById('itemName').value = itemName;
        document.getElementById('itemBrand').value = itemBrand;
        document.getElementById('itemModel').value = itemModel;
        document.getElementById('itemQty').value = itemQty;
        document.getElementById('itemPrice').value = itemPrice;
    });

    // Clear input fields when the page is loaded or refreshed
    window.addEventListener('DOMContentLoaded', function() {
        clearInputFields();
    });

    function clearInputFields() {
        document.getElementById('inputSelect').value = ''; // Clear the selected option
        document.getElementById('itemName').value = '';
        document.getElementById('itemBrand').value = '';
        document.getElementById('itemModel').value = '';
        document.getElementById('itemQty').value = '';
        document.getElementById('itemPrice').value = '';
    }
        // Prevent non-numeric characters in the quantity field
    document.getElementById('itemQty').addEventListener('input', function() {
        if (isNaN(parseFloat(this.value))) {
            this.value = '';
        }
    });

    // Prevent non-numeric characters in the price field
    document.getElementById('itemPrice').addEventListener('input', function() {
        if (isNaN(parseFloat(this.value))) {
            this.value = '';
        }
    });
</script>

</body>
 
</html>