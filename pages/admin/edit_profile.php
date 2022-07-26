<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:../../index.php');
}
?>

<?php
include '../../config/dbcon.php';

$uniqueid = $_GET['id'];

$selectquery = "select * from farmer_data where farmeruniqueid = '$uniqueid'";

$query = mysqli_query($con, $selectquery);
$show = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>edit_profile</title>
  <style>
    label {
      display: inline-block;
      width: 142px;
    }
  </style>
  <!-- Bootstrap core CSS-->
  <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom fonts for this template-->
  <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Page level plugin CSS-->
  <link href="../../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="../../style/assets/css/sb-admin.css" rel="stylesheet" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#"><?php echo $show['firstname']; ?>'s Profile</a>
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
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Farmer Data">
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

  <!-- This Page  -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <h6>Edit Farmer Profile</h6>
        </li>

      </ol>

      <form method="POST">
        <?php


        if (isset($_POST['submit'])) {

          $idupdate = $_GET['id'];


          $firstname = $_POST['firstname'];
          $middlename = $_POST['middlename'];
          $lastname = $_POST['lastname'];
          $phoneno = $_POST['phoneno'];
          $pancardno = $_POST['pancardno'];
          $aaddhaarno = $_POST['aaddhaarno'];
          $address = $_POST['Address'];
          
          $taluka = $_POST['taluka'];
          $district = $_POST['district'];
         
          $totalarea = $_POST['totalarea'];
          
          
          $nameofcanal = $_POST['nameofcanal'];
          $nameofoutlet = $_POST['nameofoutlet'];
          

          
          $querys = "update farmer_data set firstname='$firstname', middlename='$middlename', lastname='$lastname', phoneno='$phoneno',aaddhaarno=$aaddhaarno, address='$address',pancardno='$pancardno', taluka='$taluka', district='$district', totalarea='$totalarea',nameofcanal='$nameofcanal',nameofoutlet='$nameofoutlet' where farmeruniqueid='$idupdate'";


          $res = mysqli_query($con, $querys);

          //header('location:display.php');

          if ($res) {
        ?>
            <script>
              alert("Profile updated successfully");
            </script>
          <?php
          } else {
          ?>
            <script>
              alert("data not updated properly");
            </script>
        <?php
          }
        }
        ?>
        <div class="form-group row">
          <label for="inputfirstname" class="col-sm-2 col-form-label ml-4 mt-4">First Name</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputfirstname" name="firstname" value="<?php echo $show['firstname']; ?>" required />
          </div>
          <label for="inputmiddlename" class="col-sm-2 col-form-label ml-4 mt-4">Middle Name</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputmiddlename" name="middlename" value="<?php echo $show['middlename']; ?>" required />
          </div>
        </div>

        <div class="form-group row">
          <label for="inputlastname" class="col-sm-2 col-form-label ml-4 mt-4">Last Name</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputlastname" name="lastname" value="<?php echo $show['lastname']; ?>" required />
          </div>
          <label for="inputmobile" class="col-sm-2 col-form-label ml-4 mt-4">Mobile</label>
          <div class="col-sm-3">
            <input type="tel" class="form-control mt-4" id="inputmobile" value="<?php echo $show['phoneno']; ?>" name="phoneno" required />
          </div>
        </div>

        <div class="form-group row">
          <label for="inputarea" class="col-sm-2 col-form-label ml-4 mt-4">Pancard no.</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputarea" value="<?php echo $show['pancardno']; ?>" name="pancardno" required />
          </div>
          <label for="inputaadhar" class="col-sm-2 col-form-label ml-4 mt-4">Aadhar no.</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputaadhar" name="aaddhaarno" value="<?php echo $show['aaddhaarno']; ?>" required />
          </div>
        </div>

        <div class="form-group row"></div>

        <div class="form-group row"></div>
        <hr />

        <div class="form-group row">
          <label for="Address" class="col-sm-2 col-form-label ml-4 mt-4">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control mt-4" id="Address" name="email" value="<?php echo $show['email']; ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="Address" class="col-sm-2 col-form-label ml-4 mt-4">Address</label>
          <div class="col-sm-6">
            <input type="text" class="form-control mt-4" id="Address" name="Address" value="<?php echo $show['address']; ?>" />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputmouja" class="col-sm-2 col-form-label ml-4 mt-4">Mouja</label>
          <div class="col-sm-3">
            <input type="text" readonly id="first" class="form-control mt-4" id="first" name="mouja" value="<?php echo $show['mouja']; ?>" />
          </div>
          <label for="inputtaluka" class="col-sm-2 col-form-label ml-4 mt-4">Taluka</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="inputtaluka" name="taluka" value="<?php echo $show['taluka']; ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="inputdistrict" class="col-sm-2 col-form-label ml-4">District</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="inputdistrict" name="district" value="<?php echo $show['district']; ?>" />
          </div>
        </div>
        <hr />
        <div class="form-group row">
          <label for="surveyno" class="col-sm-2 col-form-label ml-4 mt-4">Survey No</label>
          <div class="col-sm-3">
            <input type="text" id="second" readonly class="form-control mt-4" id="second" name="surveyno" value="<?php echo $show['surveyno']; ?>" />
          </div>
          <label for="area" class="col-sm-2 col-form-label ml-4 mt-4">Total Area</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="area" name="totalarea" value="<?php echo $show['totalarea']; ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="nameofsub" class="col-sm-2 col-form-label ml-4 mt-4">Name of Subdivision</label>
          <div class="col-sm-3">
            <select class="form-control mt-4" disabled id="nameofsub" name="nameofsub">
              <option value="<?php echo $show['nameofsubdivision']; ?>"><?php echo $show['nameofsubdivision']; ?></option>

            </select>
          </div>
          <label for="nameoff" class="col-sm-2 col-form-label ml-4 mt-4">Name of Section Officer</label>
          <div class="col-sm-3">
            <select class="form-control mt-4" id="nameoff" disabled name="nameofsection">
              <option value="<?php echo $show['nameofsection']; ?>"><?php echo $show['nameofsection']; ?></option>
              <option value="Ranu&nbsp;Gawali&nbsp;Maam">Ranu Gawali ma'am</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="canalname" class="col-sm-2 col-form-label ml-4 mt-4">Name Of Canal</label>
          <div class="col-sm-3">
            <select class="form-control mt-4" id="nameoff" name="nameofcanal">
              <option value="<?php echo $show['nameofcanal']; ?>"><?php echo $show['nameofcanal']; ?></option>
              <option value="Main&nbsp;Canal">Main Canal</option>
              <option value="Branch&nbsp;Canal">Branch Canal</option>
              <option value="Sub&nbsp;Branch&nbsp;Canal">Sub-Branch Canal</option>
              <option value="Division&nbsp;Canal">Division Canal</option>
              <option value="Minor&nbsp;Canal">Minor Canal</option>
              <option value="SubMinor&nbsp;Canal">Sub-Minor Canal</option>
            </select>
          </div>
          <label for="outlet" class="col-sm-2 col-form-label ml-4 mt-4">Name Of Outlet</label>
          <div class="col-sm-3">
            <select class="form-control mt-4" id="outlet" name="nameofoutlet">
              <option value="<?php echo $show['nameofoutlet']; ?>"><?php echo $show['nameofoutlet']; ?></option>
              <option value="Sub&nbsp;Minor&nbsp;Canal">Sub-Minor Canal</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputmobile" class="col-sm-2 col-form-label ml-4 mt-4">Water User Association (WUA)</label>
          <div class="col-sm-3">
            <input type="text" class="form-control mt-4" id="wua" readonly name="wua" value="<?php echo $show['wuaname']; ?>" />
          </div>
        </div>

        <div class="form-group row">
          <label for="inputuniqueid" class="col-sm-2 col-form-label ml-4 mt-4">Farmer Unique ID</label>
          <div class="col-sm-6">
            <input type="text" class="form-control mt-4" id="uniqueid" name="uniqueid" readonly value="<?php echo $show['farmeruniqueid']; ?>" />
          </div>
        </div>


        <div class="form-group row">
          <div class="col-sm-10 ml-4" style="text-align: center">
            <button type="submit" class="btn btn-success" name="submit" value="Add New Entry">Update</button>

          </div>
        </div>
      </form>
    </div>
  </div>

  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
      </div>
    </div>
  </footer>
  </div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>