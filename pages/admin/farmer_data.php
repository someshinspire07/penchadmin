<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>
<?php
$i = 1
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>farmer_data</title>
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
        <a class="navbar-brand" href="../index">Farmer Data</a>
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
                    <a class="nav-link" href="../../pages/logout.htm">
                        <i class="fa fa-fw fa-sign-out"></i>Logout
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Navigation End  -->

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">

            <main>
                <!-- Icon Cards-->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Details of User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label"><i>The details in desired format</i></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Farmer Data
                    </div>


                    <div class="card-body">
                        <a href="new_entry.php"><button type="button" class="btn m-9 btn-success btn-lg float-right">Add New Farmer</button></a>
                        <br><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th> Name of Farmer</th>
                                        <!-- <th>Last Name</th> -->
                                        <th>Unique Id</th>
                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../../config/dbcon.php';

                                    $selectquery = "select * from farmer_data";

                                    $query = mysqli_query($con, $selectquery);



                                    while ($res = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $res['firstname'] . " " . $res['middlename'] . " " . $res['lastname'] ?></td>

                                            <td><?php echo $res['farmeruniqueid'] ?></td>


                                            <td><a href="manage_bills.php?id=<?php echo $res['farmeruniqueid']; ?> & fn=<?php echo $res['firstname'] ?> & middlename=<?php echo $res['middlename'] ?> & lastname=<?php echo $res['lastname'] ?>"><button type="button" class="btn m-1 btn-success">Manage Bill</button>
                                                    <a href="alltransaction.php?id=<?php echo $res['farmeruniqueid']; ?>"><button type="button" class="btn m-1 btn-warning">Transaction's</button></a>
                                                    <a href="edit_profile.php?id=<?php echo $res['farmeruniqueid']; ?> & fn=<?php echo $res['firstname'] ?> & middlename=<?php echo $res['middlename'] ?> & lastname=<?php echo $res['lastname'] ?> & add=<?php echo $res['address'] ?> & phoneno=<?php echo $res['phoneno'] ?>  & aaddhaarno=<?php echo $res['aaddhaarno'] ?> & mouja=<?php echo $res['mouja'] ?> & pancardno=<?php echo $res['pancardno'] ?> & taluka=<?php echo $res['taluka'] ?> & district=<?php echo $res['district'] ?> & surveyno=<?php echo $res['surveyno'] ?> & totalarea=<?php echo $res['totalarea'] ?> & wuaname=<?php echo $res['wuaname'] ?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE"> <button type="button" class="btn m-1 btn-primary">View / Edit</button> </a>
                                                    <a href="deletecode.php?id=<?php echo $res['farmeruniqueid']; ?>"><button type="button" onclick="return checkdelete()" class="btn m-1 btn-danger">Delete</button></a>

                                            </td>
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
        </div>
        </main>
        <!--Footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
                </div>
            </div>
        </footer>
        <!--Foooter end-->
    </div>

    <script>
        function checkdelete() {
            return confirm('Are you sure want to delete this Farmer Data');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../../style/vendor/jquery/jquery.min.js"></script>
    <script src="../../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../style/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../style/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../../style/assets/js/sb-admin.min.js"></script>
    <script src="../../style/assets/js/sb-admin-datatables.min.js"></script>
    <script src="../../style/assets/js/table2excel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>