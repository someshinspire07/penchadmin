<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>billing_data</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../../index.php">Pending Bills</a>
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


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="farmer_data.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">Farmer</span>
                    </a>
                </li>

                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Pending Bills">
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

    <!-- Navigation End  -->

    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">

            </ol>

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
                                    <label for="validationCustom01" class="form-label"><i>The details in desired
                                            format</i></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>




                <!--Dropdowns-->
                <form class="form-row" method="POST">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Season</label>
                        <select class="form-control" name="season">

                            <option value="KHARIP">KHARIP</option>
                            <option value="RABBI">RABBI</option>


                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputyear">Year</label>
                        <select class="form-control" name="year">
                            <option>Select</option>

                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2029">2030</option>
                            <option value="2029">2031</option>
                        </select>
                    </div>
                    <div>

                    </div>



                    <div class="form-group col-sm-3">
                        <br>
                        <div class="d-grid col-8 ">
                            <button type="submit" name="Submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </div>
                </form>





                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>
                    </div>
                    <!--dropdown-->

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Farmer Name</th>
                                        <th>Farmer Unique ID</th>
                                        <th>Bill Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../../config/dbcon.php';

                                    if (isset($_POST['Submit'])) {
                                        $season = $_POST['season'];
                                        $year =  $_POST['year'];

                                        if ($season != "" and $year != "") {
                                            $selectquery = " SELECT farmeruniqueid,firstname,lastname FROM `farmer_data` WHERE farmeruniqueid IN (SELECT DISTINCT farmeruniqueid FROM `farmer_data` EXCEPT SELECT farmeruniqueid FROM `bill_data` WHERE (season = '$season' AND year = '$year'))";
                                            $query = mysqli_query($con, $selectquery) or die('error');
                                            $i = 1;

                                            if (mysqli_num_rows($query) > 0) {
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    $id = $res['farmeruniqueid'];
                                                    $firstname = $res['firstname'];
                                                    $lastname = $res['lastname'];
                                    ?>

                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $firstname . " " . $lastname; ?></td>
                                                        <td><?php echo $id; ?></td>
                                                        <td><a href="generate_bill.php?uid=<?php echo $id; ?>"><button type="button" class="btn m-1 btn-outline-success" data-bs-target="#exampleModal">Generate Bill</button></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>Records not Found!</tr>
                                    <?php
                                            }
                                        }
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
        //<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>