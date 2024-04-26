<?php 
session_start();
$username = $_SESSION['username']; 
if(!isset($username)){
    header("Location: login.html");
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <?php include "navbar.html"?>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">DataTable Example</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="mb-2">
                                        <button id="refreshButton" class="btn btn-primary mr-2">Refresh</button>
                                        <span id="lastFetchedLabel" class="text-muted"></span>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Action</th>
                                                <th>Quantity In</th>
                                                <th>Quantity Out</th>
                                                <th>Total</th>
                                                <th>Date Modified</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                // Include the database connection file
                                                include 'dbcon.php';

                                                // Query to fetch data from the table and order by Date Modified in descending order
                                                $query = "SELECT dItemCode, dType, dQty_in, dQty_out, dQty_total, dDateAdded, dUsername FROM tblitemhistory ORDER BY dDateAdded DESC";
                                                $result = mysqli_query($conn, $query);
                                                while($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['dItemCode']; ?></td>
                                                <td><?php echo $row['dType']; ?></td>
                                                <td><?php echo $row['dQty_in']; ?></td>
                                                <td><?php echo $row['dQty_out']; ?></td>
                                                <td><?php echo $row['dQty_total']; ?></td>
                                                <td><?php echo $row['dDateAdded']; ?></td>
                                                <td><?php echo $row['dUsername']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <!-- DataTables Initialization -->
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            searching: true,
            order: [[5, 'desc']], // Order by Date Modified (column index: 5) in descending order
            dom: 'flrtipB',
            buttons: [
                {
                    extend: 'csv',
                    text: 'Export CSV', // Change the button name here
                    filename: function() {
                        var d = new Date();
                        var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
                        return 'TransactionHistory-' + date;
                    }
                }
            ]
        });

        var refreshButton = $('#refreshButton');
        var lastRefreshedLabel = $('#lastFetchedLabel');
        var lastFetchedTime = localStorage.getItem('lastFetchedTime');

        if (lastFetchedTime) {
            updateLastFetchedLabel(new Date(parseInt(lastFetchedTime)));
        } else {
            lastRefreshedLabel.text('Last fetched: Never');
        }

        refreshButton.on('click', function() {
            var now = new Date();
            updateLastFetchedLabel(now);
            localStorage.setItem('lastFetchedTime', now.getTime());

            $.ajax({
                url: 'fetch_data.php',
                method: 'POST',
                success: function(response) {
                    table.clear().rows.add(JSON.parse(response)).draw();
                }
            });
        });

        function updateLastFetchedLabel(lastFetchedTime) {
            var now = new Date();
            var minutesDiff = Math.floor((now.getTime() - lastFetchedTime.getTime()) / 60000);
            lastRefreshedLabel.text('Last fetched: ' + minutesDiff + ' minute(s) ago');
        }
    });
</script>

</body>
 
</html>
