<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:../../index.php');
}
?>

<
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>update_bill</title>
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
    <style>
        button {
            text-align: center;
        }
    </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../../index.html">Update Farmer bill</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="wua_section.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>



                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="farmer_data.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-address-card-o"></i>
                        <span class="nav-link-text">Farmer</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="pendingbill.php" data-parent="#exampleAccordion">
                        <i class="fa fa-credit-card"></i>
                        <span class="nav-link-text">Pending Bills</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
                    <a class="nav-link " href="paidbills.php" data-parent="#exampleAccordion">
                        <i class="fa fa-credit-card"></i>
                        <span class="nav-link-text">Transaction</span>
                    </a>
                </li>

                <li class="nav-item " data-toggle="tooltip" data-placement="right" title="feedback">
                    <a class="nav-link" href="#" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-pencil"></i>
                        <span class="nav-link-text">feedback</span>
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


            <main>
                <!-- Icon Cards-->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Subscription Amount</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Enter New Amount</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Rs." value="" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Update & Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function AadharValidate() {
                        var aadhar = document.getElementById("txtAadhar").value;
                        var adharcardTwelveDigit = /^\d{12}$/;

                        if (aadhar != '') {
                            if (aadhar.match(adharcardTwelveDigit)) {
                                return true;
                            } else {
                                alert("Enter valid Aadhar Number");
                                return false;
                            }
                        }
                    }
                </script>
                <form method="POST">
                <?php
                    include '../../config/dbcon.php';

                    $uniqueid=$_GET['id'];
                    $selectquery = "select * from bill_data where bill_id = '$uniqueid'";
                   

                    $query = mysqli_query($con,$selectquery);
                    $show = mysqli_fetch_array($query);
                ?>

        
                    <div class="row mb-3 ml-4">
                        <label for="inputname" class="col-sm-2 col-form-label mt-3">Date</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" readonly name="date" id="inputname" value="<?php echo $show['date']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Year</label>
                        <div class="col-sm-5 mt-3">
                            <select class="form-select" name='year' required aria-label="Default select example" >
                                <option value="<?php echo $show['year']; ?>"><?php echo $show['year']; ?></option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Selected Season</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" readonly name="#" id="inputvillage" value="<?php echo $show['season']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="survey" class="col-sm-2 col-form-label mt-3">Season</label>
                        <div class="col-sm-5 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="season" value="KHARIP" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                KHARIP
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="season" value="RABBI" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                RABBI
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="input" class="col-sm-2 col-form-label mt-3">Farmer Unique ID</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control"name="fameruniqueid" readonly id="inputname" value="<?php echo $show['farmeruniqueid']; ?>">
                        </div>
                    </div>
                   
                    <div class="row mb-3 ml-4">
                        <label for="irigatedarea" class="col-sm-2 col-form-label mt-3">Irrigated Area</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" value="<?php echo $show['irrigatedarea']; ?>" name="irarea" id="irrigatedarea">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="Rate" class="col-sm-2 col-form-label mt-3">Total Crop Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" value="<?php echo $show['amount'];?>" name="rate" id="Rate">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="Rate" class="col-sm-2 col-form-label mt-3">Outstanding Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" value="<?php echo $show['outstanding_amount'];?>" name="outamt" id="Rate">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="amount" class="col-sm-2 col-form-label mt-3">Outstanding amount Reason</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" value="<?php echo $show['outstanding_Reason'];?>" name="amt" id="Amount">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="total" class="col-sm-2 col-form-label mt-3">Total Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" value="<?php echo $show['total_amount']; ?>" name="totalamt" id="total">
                        </div>
                    </div>
                    <br><br>
                    <div class="col-mid-12 text-center mt-3 mb-5">
                        <button class="btn btn-primary" name="update" type="submit" >Update Bill</button>
                    </div>
                    }
                </form>
                <?php
                     include '../../config/dbcon.php';
                     $uniqueid=$_GET['id'];

                if(isset($_POST['update'])){

                    $idupdate =$_GET['id'];  

                 
                    $year=$_POST['year'];
                    $season=$_POST['season'];

                    
                    $irrigatedarea=$_POST['irarea'];
                    $irrigatedarea=$_POST['rate'];
                    $amount=$_POST['outamt'];
                    $totalamount=$_POST['totalamt'];

                    $querys = "update bill_data set date='$date', year='$year', season='$season', farmeruniqueid='$farmeruniqueid',totalarea='$totalarea', irrigatedarea='$irrigatedarea', rate='$rate', amount='$amount', totalamount='$totalamount' , farmeruniqueid='$uniqueid' where bill_id='$idupdate'";

                    $res = mysqli_query($con,$querys);
                    if($res){
                        ?>
                        <script>
                            alert("data updated properly");
                        </script>
                        <?php
                        }else{
                            ?>
                            <script>
                                alert("data not updated properly");
                            </script>
                            <?php
                        }
                    }
                    ?>
            </main>
            <!--Footer-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>REPAIR भारत | ADMIN PANEL SYSTEM</small>
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
        </script>

<script src="jquery-3.5.0.min.js"></script>
	    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#irigatedarea, #rate").keyup(function(){

    	var amount=0;    	
    	var x = Number($("#irigatedarea").val());
    	var y = Number($("#rate").val());
    	var amount=x * y;  

    	$('#amount').val(amount);

        });
        });
        </script>

</body>

</html>
                