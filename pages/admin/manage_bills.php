<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>

<?php
$i = 1;
include '../../config/dbcon.php';
$uniqueid = $_GET['id'];



$selectquery = "select * from bill_data where farmeruniqueid='$uniqueid' ";
$selectqueryfd = "select * from farmer_data where farmeruniqueid='$uniqueid' ";
$query = mysqli_query($con, $selectquery);
$queryfd = mysqli_query($con, $selectqueryfd);
$arrdata = mysqli_fetch_array($queryfd);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>manage_bill</title>

    <!-- Bootstrap core CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../style/assets/css/sb-admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../index">Manage Bill section</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                    <a class="nav-link  " href="wua_section.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-home"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>

                </li>


                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="farmer_data.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">Farmer</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pending Bills">
                    <a class="nav-link " href="pendingbill.php" data-parent="#exampleAccordion">
                        <i class="fa fa-credit-card"></i>
                        <span class="nav-link-text">Pending Bills</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer Data">
                    <a class="nav-link" href="paidbills.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Paid Bills</span>
                    </a>
                </li>



            </ul>
            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>


    </nav>

    <div class="content-wrapper">
        <div class="container-fluid">



            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>Manage Bills
                </div>
                <div class="container" style="margin-top:2%;">
                    <a href="generate_bill.php?uid=<?php echo $uniqueid ?>"><button type="button" class="btn m-9 btn-success btn-lg float-right">Add New Bill</button></a>
                </div><br>




                <h2 class="col-sm-6"><?php echo $arrdata['firstname'] . " " . $arrdata['middlename'] . " " . $arrdata['lastname']; ?></h2>
                <h5 class="col-sm-6">Farmer Unique ID : <?php echo $arrdata['farmeruniqueid']; ?></h5>





                <div class="card-body">

                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Bill_ID</th>
                                    <th>Season</th>
                                    <th>Year</th>
                                    <th>Total Bill amount</th>
                                    <th>PAID/UNPAID</th>
                                    <th>Billing Area</th>

                                </tr>
                            </thead>
                            <?php


                            while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <tbody>


                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $res['bill_id'] ?></td>
                                        <td><?php echo $res['season'] ?></td>
                                        <td><?php echo $res['year'] ?></td>
                                        <td><?php echo $res['total_amount'] ?></td>
                                        <td><?php echo $res['status'] ?></td>
                                        <td>
                                            <!-- <a href="edit_bill.php?id=<?php echo $res['bill_id'] ?>"><button type="button" class="btn btn-warning">Edit Bill</button></a> -->

                                            <a href="allbilltransaction.php?id=<?php echo $res['bill_id'] ?>"><button type="button" name="delete" class="btn btn-warning">Transaction</button></a>
                                            <?php
                                            if ($res['status'] == "PAID") {
                                            ?>
                                                <a href="receipt.php?id=<?php echo $res['bill_id'] ?>"><button type="button" class="btn btn-info">Receipt</button></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($res['status'] != "PAID") {
                                            ?>
                                                <a href="payoffline.php?id=<?php echo $res['bill_id'] ?>"><button type="button" class="btn btn-primary">Pay Offline</button></a>
                                            <?php
                                            }
                                            ?>

                                            <?php if ($res['total_amount'] ==  $res['pending_amount']) {
                                            ?>
                                                <a href="deletebill.php?id=<?php echo $res['bill_id'] ?>"><button type="button" name="delete" class="btn btn-danger" onclick="return checkdelete()">Delete</button></a>
                                            <?php
                                            }
                                            ?>

                                        </td>


                                    </tr>


                                <?php

                            }
                                ?>
                                </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <!-- footer -->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
                    </div>
                </div>
            </footer>
            <!-- footer end -->
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="assets/js/sb-admin.min.js"></script>
        <script src="assets/js/sb-admin-datatables.min.js"></script>
        <script src="assets/js/table2excel.js"></script>
        <script>
            function checkdelete() {
                return confirm('Are you sure want to delete this Bill');
            }
        </script>


        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>