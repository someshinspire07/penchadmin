<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>

<?php

include '../../config/dbcon.php';
$uniqueid = $_GET['id'];

$selectuid = "select farmeruniqueid from bill_data where bill_id='$uniqueid' ";
$fuid = mysqli_query($con, $selectuid);
$arr = mysqli_fetch_array($fuid);
$selectqueryfd = "select * from farmer_data where farmeruniqueid='{$arr['farmeruniqueid']}' ";

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
    <title>Pay_Offline</title>

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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

    <!-- Datatable Dependency end -->
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="#">Pay Offline</a>
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
    <!-- Navigation end -->
    <!-- This Page  -->
    <div class="content-wrapper">
        <div class="container-fluid">



            <!-- Example DataTables Card-->
            <div class="card mb-3" id="table_id">
                <div class="card-header">
                    <h4><?php echo $arrdata['firstname'] . " " . $arrdata['middlename'] . " " . $arrdata['lastname']; ?></h4>
                </div>

                <form method="POST">
                    <?php
                    include '../../config/dbcon.php';

                    $uniqueid = $_GET['id'];
                    $selectquery = "select * from bill_data where bill_id = '$uniqueid'";


                    $query = mysqli_query($con, $selectquery);
                    $show = mysqli_fetch_array($query);
                    ?>

                    <div class="row mb-3 ml-4">
                        <label for="inputname" class="col-sm-2 col-form-label mt-3">Bill ID</label>
                        <div class="col-sm-5 mt-3">
                            <h4><?php echo $show['bill_id']; ?></h4>
                        </div>
                    </div>

                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Year</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" readonly name="year" id="inputvillage" value="<?php echo $show['year']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Season</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" readonly name="#" id="inputvillage" value="<?php echo $show['season']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="input" class="col-sm-2 col-form-label mt-3">Farmer Unique ID</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" readonly name="fameruniqueid" readonly id="inputname" value="<?php echo $show['farmeruniqueid']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputtarea" class="col-sm-2 col-form-label mt-3">Irrigatd Area</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" readonly name="area" readonly value="<?php echo $show['irrigatedarea']; ?>" id="inputtarea">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="irigatedarea" class="col-sm-2 col-form-label mt-3">Total Water Bill</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" readonly value="<?php echo $show['total_amount']; ?>" name="totalbill">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="Rate" class="col-sm-2 col-form-label mt-3">Pending Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" readonly id="totalbill" value="<?php echo $show['pending_amount']; ?>" name="">
                        </div>
                    </div>

                    <?php
                    if ($show['pending_amount'] != 0) {
                    ?>
                        <div class="row mb-3 ml-4">
                            <label for="Rate" class="col-sm-2 col-form-label mt-3">Paying Amount Cash</label>
                            <div class="col-sm-5 mt-3">
                                <input type="number" class="form-control" id="pay" onkeyup="change()" value="" name="pay">
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="row mb-3 ml-4">
                        <label for="amount" class="col-sm-2 col-form-label mt-3">Balance Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" readonly id="amt" value="" name="amt">
                        </div>
                    </div>







                    <div class="d-grid gap-2 col-6" style="margin-left:222px ;">
                        <button class="btn btn-primary btn-lg" onclick="return checkpay()" type="submit" name="update">Pay</button>

                    </div>



                </form>
                <?php
                if (isset($_POST['update'])) {


                    $payment_id = "off" . date("ys") . rand(1, 9);
                    date_default_timezone_set('Asia/Kolkata');
                    $payment_date =  date('d-m-y');

                    $amount_paid = $_POST['pay'];
                    $uid = $arr['farmeruniqueid'];
                    $pending_amount = (int)$_POST['amt'];
                    date_default_timezone_set('Asia/Kolkata');
                    $payment_time = date('h:i A');


                    $insert = "INSERT INTO `transaction_data`(`farmeruniqueid`, `bill_id`, `amount_paid`, `mode`, `trans_date`, `trans_id`, `amt_pndng_on_date`,`trans_time`) VALUES
                        ('$uid','$uniqueid','$amount_paid','Offline','$payment_date','$payment_id','$pending_amount','$payment_time')";

                    $res = mysqli_query($con, $insert);


                    if ($res) {

                        if ($pending_amount == 0) {
                            $Status = 'PAID';
                            $updatequery = "UPDATE `bill_data` SET `pending_amount`='$pending_amount', `status`='$Status',`final_pay_date`='$payment_date' where `bill_id` = '$uniqueid'";
                            mysqli_query($con, $updatequery);
                        } else {
                            $Status = 'PENDING';
                            $updatequery = "UPDATE `bill_data` SET `pending_amount`='$pending_amount', `status`='$Status' where `bill_id` = '$uniqueid'";
                            mysqli_query($con, $updatequery);
                        }
                ?>
                        <script>
                            alert("Payment Sucessfull");
                            location.replace("trans_receipt.php?id=<?php echo $payment_id ?>");
                        </script>

                    <?php
                    } else {
                    ?>
                        <script>
                            alert("Payment not Sucessfull");
                        </script>
                <?php
                    }
                }
                ?>


            </div>
        </div>

        <!-- footer -->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small><b>Pench Recovery Admin Panel</b></small>
                </div>
            </div>
        </footer>
        <!-- footer end -->
    </div>


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
    <script src="jquery-3.5.0.min.js"></script>
    <script>
    
    document.getElementById('pay').defaultValue = '<?php echo $show['total_amount']; ?>';
    amount = document.getElementById('pay').defaultValue;


    function change() {
      let amount = parseInt(document.getElementById('pay').value);
      if (Number(amount) > Number(document.getElementById('pay').defaultValue)) {
        document.getElementById('pay').value = '<?php echo $show['pending_amount']; ?>';
        amount = parseInt('<?php echo $show['pending_amount']; ?>');
      }
      if (amount == 0) {
        amount = parseInt('<?php echo $show['pending_amount']; ?>');
        document.getElementById('pay').value=amount;
      }}
      </script>
    <script>
        $(document).ready(function() {
            // Get value on keyup funtion
            $("#totalbill, #pay").keyup(function() {

                var amount = 0;
                var x = Number($("#totalbill").val());
                var y = Number($("#pay").val());
                var amount = x - y;

                $('#amt').val(amount);

            });
        });
    </script>
    <script>
        function checkpay() {
            return confirm('Confirm payment');
        }
    </script>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>