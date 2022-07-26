<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>
<?php
$i = 0;
include '../../config/dbcon.php';
$uniqueid = $_GET['uid'];
$selectquery = "select * from farmer_data where farmeruniqueid='$uniqueid' ";
$query = mysqli_query($con, $selectquery);
$arrdata = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>generate_bill.php</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css'>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    <style>
        button {
            text-align: center;
        }
    </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="#">Generate Bill</a>
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





                <form class="form-control" method="POST">

                    <div class="row mb-3 ml-4">
                        <label for="inputname" class="col-sm-2 col-form-label mt-3">Date</label>
                        <div class="col-sm-5 mt-3">

                            <input type="text" class="form-control" readonly name="date" value="<?php echo  date("d/m/y"); ?>">

                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Year</label>
                        <div class="col-sm-5 mt-3">
                            <select class="form-select" name='year' required aria-label="Default select example">
                                <option value="">Select Year</option>
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
                        <label for="survey" class="col-sm-2 col-form-label mt-3">Season</label>
                        <div class="col-sm-5 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="season" value="KHARIP" id="flexRadioDefault1" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    KHARIP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="season" value="RABBI" id="flexRadioDefault2" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    RABBI
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="input" class="col-sm-2 col-form-label mt-3">Farmer Unique ID</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" id="inputname" readonly name="farmeruniqueid" value="<?php echo $arrdata['farmeruniqueid']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputname" class="col-sm-2 col-form-label mt-3">Name of Farmer</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" id="inputname" readonly name="nameoffarmer" value="<?php echo $arrdata['firstname'];
                                                                                                                        echo "  ";
                                                                                                                        echo $arrdata['middlename'];
                                                                                                                        echo "  ";
                                                                                                                        echo $arrdata['lastname']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputvillage" class="col-sm-2 col-form-label mt-3">Mouza</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" id="inputvillage" readonly name="mouja" value="<?php echo $arrdata['mouja']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="survey" class="col-sm-2 col-form-label mt-3">Survey No : </label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" readonly value="<?php echo $arrdata['surveyno']; ?>" class="form-control" id="survey" name="surveyno">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="input" class="col-sm-2 col-form-label mt-3">Name of Subdivison</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" value="<?php echo $arrdata['nameofsubdivision']; ?>" readonly class="form-control" id="inputname" name="nameofsubdivision">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputsec" class="col-sm-2 col-form-label mt-3">Name of Section</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" value="<?php echo $arrdata['nameofsection']; ?>" readonly class="form-control" id="inputsec" name="nameofsection">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="inputtarea" class="col-sm-2 col-form-label mt-3">Total Area</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" readonly value="<?php echo $arrdata['totalarea']; ?>" class="form-control" id="inputtarea" name="totalarea" value="<?php echo $arrdata['totalarea'] ?>">
                        </div>
                    </div>

                    <div class="row mb-3 ml-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h5 class='text-success'></h5>
                                <table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>Type of Crop</th>
                                            <th>Area</th>
                                            <th>Rate</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id='product_tbody'>
                                        <tr>
                                            <td><select class="form-select" name='pname[]' aria-label="Default select example" required>
                                                    <option value="">Select Type of Crop</option>
                                                    <option value="1">Rice</option>
                                                    <option value="2">Wheat</option>
                                                    <option value="3">Chana</option>
                                                    <option value="1">Cotton</option>
                                                    <option value="2">Tur</option>
                                                    <option value="3">Vegetable</option>
                                                    <option value="1">Chilli</option>
                                                    <option value="1">Other</option>

                                                </select>
                                            </td>
                                            <td><input type='number' required name='area' class='form-control price'></td>
                                            <td><input type='number' required name='rate' class='form-control qty'></td>
                                            <td><input type='number' name='total[]' class='form-control total' readonly></td>
                                            <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input type='button' value='+ Add Row' class='btn btn-primary btn-sm' id='btn-add-row'></td>
                                            <td colspan='2' class='text-right'>Total</td>
                                            <td><input type='text' name='grand_total' id='grand_total' class='form-control' readonly></td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 ml-4">
                        <label for="amount" class="col-sm-2 col-form-label mt-3">Irrigated Area</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" id="irrarea" name="area" value="">
                        </div>
                    </div>

                    <div class="row mb-3 ml-4">
                        <label for="amount" class="col-sm-2 col-form-label mt-3">Outstanding Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" id="oamount" name="oamount" value="">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="amount" class="col-sm-2 col-form-label mt-3">Outstanding Amount Reasone</label>
                        <div class="col-sm-5 mt-3">
                            <input type="text" class="form-control" id="amount" name="oreason" value="">
                        </div>
                    </div>
                    <div class="row mb-3 ml-4">
                        <label for="total" class="col-sm-2 col-form-label mt-3">Total Bill Amount</label>
                        <div class="col-sm-5 mt-3">
                            <input type="number" class="form-control" id="ftotal" name="totalamount" readonly value="">
                        </div>
                    </div>




                    <br><br>
                    <div class="col-mid-12 text-center mt-3 mb-5">
                        <button class="btn btn-primary" type="submit" name="submit" value="Generate_bil">Generate Bill</button>
                    </div>
                </form>
            </main>

            <?php
            include '../../config/dbcon.php';


            if (isset($_POST['submit'])) {


                $date = $_POST['date'];
                $year = $_POST['year'];
                $season = $_POST['season'];
                $farmeruniqueid = $_POST['farmeruniqueid'];
                $amount = $_POST['grand_total'];
                $outamount = $_POST['oamount'];
                $totalamount = $_POST['totalamount'];
                $outreason = $_POST['oreason'];
                $irrigatedarea = $_POST['area'];
                $billid = substr($farmeruniqueid, 0, 3) . date("ys") . rand(1, 9);




                $insertquery = "INSERT INTO bill_data (amount,total_amount,date,year,season,farmeruniqueid,outstanding_amount, outstanding_Reason,bill_id,irrigatedarea,pending_amount) VALUES
                         ('$amount','$totalamount','$date','$year','$season','$farmeruniqueid','$outamount','$outreason','$billid','$irrigatedarea','$totalamount')";

                $res = mysqli_query($con, $insertquery);



                if ($res) {
            ?>
                    <script>
                        alert("Bill Generated");
                        location.replace("manage_bills.php?id=<?php echo $uniqueid; ?>");
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("Bill Not Generated");
                    </script>
            <?php
                }
            }
            ?>
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
            $(document).ready(function() {
                $("#date").datepicker({
                    dateFormat: "dd-mm-yy"
                });

                $("#btn-add-row").click(function() {
                    var row = "<tr> <td><select class='form-select' name='pname[]' aria-label='Default select example'><option selected>Select Type of Crop</option><option value='1'>Rice</option><option value='2'>Wheat</option><option value='3'>Chana</option><option value='1'>Cotton</option><option value='2'>Tur</option><option value='3'>Vegetable</option><option value='1'>Chilli</option> <option value='1'>Other</option></select></td> <td><input type='number' required name='price[]' class='form-control price'></td> <td><input type='number' required name='qty[]' class='form-control qty'></td> <td><input type='number' required name='total[]' class='form-control total'></td> <td><input type='button' value='x' class='btn btn-danger btn-sm btn-row-remove'> </td> </tr>";
                    $("#product_tbody").append(row);
                });

                $("body").on("click", ".btn-row-remove", function() {
                    if (confirm("Are You Sure?")) {
                        $(this).closest("tr").remove();
                        grand_total();
                    }
                });

                $("body").on("keyup", ".price", function() {
                    var price = Number($(this).val());
                    var qty = Number($(this).closest("tr").find(".qty").val());
                    $(this).closest("tr").find(".total").val(price * qty);
                    grand_total();
                });

                $("body").on("keyup", ".qty", function() {
                    var qty = Number($(this).val());
                    var price = Number($(this).closest("tr").find(".price").val());
                    $(this).closest("tr").find(".total").val(price * qty);
                    grand_total();
                });

                function grand_total() {
                    var tot = 0;
                    $(".total").each(function() {
                        tot += Number($(this).val());
                    });
                    $("#grand_total").val(tot);

                }
                $("body").keyup(function() {

                    var amount = 0;
                    var x = Number($("#grand_total").val());
                    var y = Number($("#oamount").val());
                    var amount = x + y;

                    $('#ftotal').val(amount);
                });

            });
        </script>


        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>